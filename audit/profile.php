<?php
require '/app/vendor/autoload.php';
$app=require '/app/bootstrap/app.php';
$kernel=$app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();
$f=json_decode(file_get_contents('/tmp/load-fixtures.json'),true);
$paths=['/','/amol','/kelardasht','/duties','/services','/news','/managers?group=1','/staff/it',$f['governor_path'],'/content/'.$f['article'],'/api/v1/home','/api/v1/contents','/api/v1/search?q=آزمون','/api/v1/members?kind=manager&member_group=1','/api/v1/links','/api/v1/citizen/dashboard','/api/v1/admin/dashboard'];
$out=[];
$queries=[];$listening=false;
Illuminate\Support\Facades\DB::listen(function($q)use(&$queries,&$listening){if($listening)$queries[]=['sql'=>$q->sql,'ms'=>$q->time,'bindings'=>$q->bindings];});
foreach($paths as $path){
 $queries=[];$listening=true;
 $app['auth']->forgetGuards();
 $request=Illuminate\Http\Request::create($path,'GET',[],[],[],['REMOTE_ADDR'=>'127.0.0.1','HTTP_HOST'=>'localhost','HTTP_ACCEPT'=>str_starts_with($path,'/api')?'application/json':'text/html','HTTP_X_FORWARDED_FOR'=>'198.18.250.'.(count($out)+1)]);
 if(str_contains($path,'/citizen/'))$request->headers->set('Authorization','Bearer '.$f['actors'][0]['token']);
 if(str_contains($path,'/admin/'))$request->headers->set('Authorization','Bearer '.$f['admins'][0]['token']);
 $start=microtime(true);$response=$kernel->handle($request);$duration=(microtime(true)-$start)*1000;$listening=false;
 $sorted=$queries;usort($sorted,fn($a,$b)=>$b['ms']<=>$a['ms']);$top=[];
 foreach(array_slice($sorted,0,3) as $q){$plan=[];if(preg_match('/^select /i',$q['sql']))try{$plan=Illuminate\Support\Facades\DB::select('EXPLAIN '.$q['sql'],$q['bindings']);}catch(Throwable){}$top[]=['sql'=>$q['sql'],'ms'=>$q['ms'],'explain'=>$plan];}
 $groups=[];foreach($queries as $q){$key=hash('sha256',$q['sql'].json_encode($q['bindings']));$groups[$key]??=['sql'=>$q['sql'],'count'=>0,'ms'=>0];$groups[$key]['count']++;$groups[$key]['ms']+=$q['ms'];}
 $duplicates=array_values(array_filter($groups,fn($q)=>$q['count']>1));usort($duplicates,fn($a,$b)=>$b['count']<=>$a['count']);
 $out[]=['path'=>$path,'status'=>$response->getStatusCode(),'ms'=>$duration,'queries'=>count($queries),'sql_ms'=>array_sum(array_column($queries,'ms')),'bytes'=>strlen($response->getContent()),'resolved_ip'=>$request->ip(),'top_queries'=>$top,'identical_duplicate_queries'=>array_slice($duplicates,0,10)];
 $kernel->terminate($request,$response);
}
file_put_contents('/tmp/query-profile.json',json_encode($out,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));echo 'Profiled '.count($out).' paths'.PHP_EOL;
