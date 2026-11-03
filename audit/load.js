import http from 'k6/http';
import {sleep,check} from 'k6';
import {Counter,Rate,Trend} from 'k6/metrics';
import {SharedArray} from 'k6/data';
import exec from 'k6/execution';
const vus=Number(__ENV.TARGET_VUS||1), mode=__ENV.MODE||'mixed';
const hold=mode==='mixed'&&vus===1000?90:30;
const fixtures=JSON.parse(open('/input/load-meta.json'));
const citizens=new SharedArray('citizens',()=>JSON.parse(open('/input/load-fixtures.json')).actors);
const admins=new SharedArray('admins',()=>JSON.parse(open('/input/load-fixtures.json')).admins);
const jpeg=mode==='uploads'?open('/input/load-image.jpg','b'):null;
const base='http://127.0.0.1:8080'; // Hard-coded isolated loopback target; never a public host.
const latency=new Trend('successful_latency',true);
const errors=new Rate('server_errors');
const limited=new Rate('rate_limited');
const success=new Rate('successful_requests');
const statuses=new Counter('response_status');
const started=new Counter('users_started');
const unexpected=new Counter('unexpected_responses');
let first=true;
const routes=['home','county','duties','services','members','personal','article','api_home','api_contents','search','api_catalog','citizen','admin','write_report','upload','auth_ui','session_login','admin_ui','admin_web_api'];
const thresholds={server_errors:['rate<0.01'],successful_requests:['rate>0.99'],successful_latency:['p(95)<2000']};
for(const route of routes){
 thresholds[`successful_latency{route:${route}}`]=['p(95)<2000'];
 // Per-route thresholds collect submetrics; global thresholds define the diagnostic SLO.
 thresholds[`server_errors{route:${route}}`]=['rate<=1'];
 thresholds[`successful_requests{route:${route}}`]=['rate>=0'];
 thresholds[`rate_limited{route:${route}}`]=['rate<=1'];
}
for(const code of [0,200,201,301,302,400,401,403,404,419,422,429,500,502,503,504])thresholds[`response_status{status:${code}}`]=['count>=0'];
thresholds['successful_latency{window:steady}']=['p(95)<2000'];
thresholds['server_errors{window:steady}']=['rate<0.01'];
export const options={
 discardResponseBodies:true,
 noCookiesReset:mode==='sessions',
 scenarios:{load:{executor:'ramping-vus',startVUs:Math.min(vus,10),stages:[{duration:'15s',target:vus},{duration:`${hold}s`,target:vus},{duration:'10s',target:0}],gracefulRampDown:'15s',gracefulStop:'15s'}},
 thresholds,summaryTrendStats:['avg','min','med','max','p(90)','p(95)','p(99)'],
};
function request(method,path,route,actor=null,body=null,extra={}){
 const headers={Accept:path.startsWith('/api')?'application/json':'text/html','X-Forwarded-For':mode==='nat'?'198.18.255.1':`198.18.${Math.floor((__VU-1)/250)}.${1+((__VU-1)%250)}`};
 if(actor)headers.Authorization='Bearer '+actor.token;
 if(body&&typeof body==='string')headers['Content-Type']='application/json';
 const steady=exec.instance.currentTestRunDuration>=15000&&exec.instance.currentTestRunDuration<(15000+hold*1000);
 const tags={route,mode,stage:String(vus),window:steady?'steady':'ramp'};
 const r=http.request(method,base+path,body,{...extra,timeout:'12s',redirects:0,headers:{...headers,...(extra.headers||{})},tags});
 const ok=r.status>=200&&r.status<300;
 statuses.add(1,{...tags,status:String(r.status)});errors.add(r.status===0||r.status>=500,tags);limited.add(r.status===429,tags);success.add(ok,tags);
 if(ok)latency.add(r.timings.duration,tags);
 if(!ok)unexpected.add(1,tags);
 check(r,{'status is 2xx':()=>ok},{route});
 return r;
}
export default function(){
 const actor=citizens[(__VU-1)%citizens.length],admin=admins[(__VU-1)%admins.length];
 if(first){
  started.add(1);first=false;
  if(mode==='sessions'){
   const login=request('GET','/panel/admin/login','auth_ui',null,null,{responseType:'text'});
   const csrf=login.body?.match(/name="csrf-token" content="([^"]+)"/)?.[1];
   request('POST','/session/login','session_login',null,JSON.stringify({audience:'staff',login:admin.username,password:'Disposable-Load-Fixture42!'}),{headers:{'X-CSRF-TOKEN':csrf||''}});
  }
 }
 if(mode==='sessions'){request('GET','/panel/admin','admin_ui');request('GET','/web-api/v1/admin/dashboard','admin_web_api');sleep(2);return;}
 if(mode==='nat'){request('GET','/api/v1/settings','api_catalog');sleep(.1);return;}
 if(mode==='writes'){
  request('POST','/api/v1/citizen/tickets','write_report',actor,JSON.stringify({type:'report',category:fixtures.report_category,county_id:fixtures.county_id,subject:`گزارش آزمون ${__VU}-${__ITER}`,body:'این گزارش ساختگی فقط در دیتابیس آزمایشی ثبت می‌شود.'}));sleep(2);return;
 }
 if(mode==='uploads'){request('POST','/api/v1/media','upload',admin,{file:http.file(jpeg,'fixture.jpg','image/jpeg'),visibility:'public'});sleep(3);return;}
 const choice=Math.random();
 if(choice<.35){
  const pages=[['/','home'],['/amol','county'],['/kelardasht','county'],['/duties','duties'],['/services','services'],['/managers?group=1','members'],['/staff/it','personal'],[fixtures.governor_path,'personal'],[`/content/${fixtures.article}`,'article']];
  const [path,route]=pages[Math.floor(Math.random()*pages.length)];request('GET',path,route);
 }else if(choice<.70){
  const apis=[['/api/v1/home','api_home'],['/api/v1/contents?per_page=20','api_contents'],['/api/v1/contents?news_scope=governorates','api_contents'],['/api/v1/search?q='+encodeURIComponent('آزمون'),'search'],['/api/v1/members?kind=manager&member_group=1','members'],['/api/v1/links','api_catalog'],['/api/v1/galleries','api_catalog']];
  const [path,route]=apis[Math.floor(Math.random()*apis.length)];request('GET',path,route);
 }else if(choice<.95){
  const apis=['/api/v1/citizen/dashboard','/api/v1/citizen/tickets','/api/v1/citizen/notifications'];request('GET',apis[Math.floor(Math.random()*apis.length)],'citizen',actor);
 }else{const apis=['/api/v1/admin/dashboard','/api/v1/admin/reports','/api/v1/admin/contents'];request('GET',apis[Math.floor(Math.random()*apis.length)],'admin',admin);}
 sleep(1+Math.random()*2);
}
export function handleSummary(data){return {[`/output/${mode}-${vus}.json`]:JSON.stringify(data,null,2),stdout:JSON.stringify({mode,target:vus,actual_users_started:data.metrics.users_started?.values.count,requests:data.metrics.http_reqs?.values.count,success:data.metrics.successful_requests?.values.rate,errors:data.metrics.server_errors?.values.rate,rate_limited:data.metrics.rate_limited?.values.rate,p95:data.metrics.successful_latency?.values['p(95)']})+'\n'};}
