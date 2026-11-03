import json, urllib.request, urllib.error, time
f=json.load(open('audit-results/load-fixtures.json'))
base='http://127.0.0.1:8080'
paths=['/','/amol','/kelardasht','/duties','/services','/news','/announcements','/resolutions','/links','/events','/gallery','/managers?group=1','/managers?group=2','/managers?group=3','/managers?group=4','/staff/it',f['governor_path'],'/content/'+str(f['article']),'/login','/register','/panel/admin/login',f['image']]
paths += ['/api/v1/'+p for p in ['health','home','portals/county-amol','settings','menus','contents','news','announcements','resolutions','pages','publications','tenders','contracts','calls','events','duties','documents','categories','counties','organizations','members','services','links','faqs','quotes','galleries','polls','forms','forum/topics','search?q=آزمون']]
paths += ['/api/v1/admin/'+p for p in ['dashboard','resources','reports','reports/options','users','roles','settings','custom-pages','annual-slogan','audit-logs',*f['resources']]]
paths += ['/api/v1/citizen/'+p for p in ['dashboard','tickets','submissions','notifications']]
rows=[]
for i,path in enumerate(dict.fromkeys(paths)):
 import urllib.parse
 path=urllib.parse.quote(path,safe='/?=&%')
 headers={'Accept':'application/json' if '/api/' in path else 'text/html','X-Forwarded-For':f'198.18.240.{i+1}'}
 if '/api/v1/admin/' in path:headers['Authorization']='Bearer '+f['admins'][0]['token']
 if '/api/v1/citizen/' in path:headers['Authorization']='Bearer '+f['actors'][0]['token']
 start=time.monotonic()
 try:
  with urllib.request.urlopen(urllib.request.Request(base+path,headers=headers),timeout=20) as r:status=r.status;size=len(r.read())
 except urllib.error.HTTPError as e:status=e.code;size=len(e.read())
 except Exception as e:status=0;size=0
 rows.append({'path':path,'status':status,'ms':(time.monotonic()-start)*1000,'bytes':size})
json.dump(rows,open('audit-results/smoke.json','w'),ensure_ascii=False,indent=2)
print('SMOKE',len(rows),'requests; statuses', {s:sum(r['status']==s for r in rows) for s in {r['status'] for r in rows}})
