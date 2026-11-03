<?php
require '/app/vendor/autoload.php';
$app = require '/app/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
use App\Models\{User,Role,Organization,Content,Category,Media,Member,Menu,MenuItem,Service,Gallery,GalleryItem,Link,Setting};
use Illuminate\Support\Facades\{DB,Hash,Artisan};
if (config('database.connections.mysql.database') !== 'ostandari_load_testing' || config('database.connections.mysql.host') !== '127.0.0.1') throw new RuntimeException('Disposable database only.');
Artisan::call('migrate', ['--force'=>true]);
Artisan::call('db:seed', ['--force'=>true]);
$root=Organization::where('type','governorate')->firstOrFail();
$hash=Hash::make('Disposable-Load-Fixture42!');
$admin=User::create(['username'=>'load_admin','name'=>'مدیر آزمون بار','password'=>$hash,'role_id'=>Role::where('name','super_admin')->value('id'),'organization_id'=>$root->id,'person_type'=>'staff','access_scope'=>'all','is_active'=>true]);
app(App\Services\MemberDirectory::class)->import();
App\Services\StaffPortals::sync();
$now=now();$rows=[];
for($i=1;$i<=1000;$i++)$rows[]=['username'=>'load_citizen_'.$i,'name'=>'کاربر آزمون '.$i,'role_id'=>Role::where('name','citizen')->value('id'),'person_type'=>'citizen','is_active'=>true,'created_at'=>$now,'updated_at'=>$now];
foreach(array_chunk($rows,200) as $chunk)DB::table('users')->insert($chunk);
$actors=[];
foreach(User::where('username','like','load_citizen_%')->orderBy('id')->get() as $user)$actors[]=['id'=>$user->id,'token'=>$user->createToken('disposable-load',['*'],now()->addHours(2))->plainTextToken];
$admins=[];
for($i=0;$i<20;$i++){
 $u=$i===0?$admin:User::create(['username'=>'load_admin_'.$i,'name'=>'مدیر آزمون '.$i,'password'=>$hash,'role_id'=>$admin->role_id,'organization_id'=>$root->id,'person_type'=>'staff','access_scope'=>'all','is_active'=>true]);
 $admins[]=['id'=>$u->id,'username'=>$u->username,'token'=>$u->createToken('disposable-load',['*'],now()->addHours(2))->plainTextToken];
}
$image=imagecreatetruecolor(1600,900);$bg=imagecolorallocate($image,12,77,110);imagefill($image,0,0,$bg);$white=imagecolorallocate($image,230,245,246);
for($i=0;$i<100;$i++)imageline($image,0,$i*9,1600,900-$i*9,$white);
imagejpeg($image,'/tmp/load-image.jpg',85);imagedestroy($image);$bytes=file_get_contents('/tmp/load-image.jpg');$media=[];
for($i=0;$i<20;$i++){
 $m=Media::create(['user_id'=>$admin->id,'organization_id'=>$root->id,'disk'=>'public','path'=>'load/fixture-'.$i.'.jpg','original_name'=>'load-image.jpg','mime'=>'image/jpeg','size'=>strlen($bytes),'visibility'=>'public','width'=>1600,'height'=>900]);
 App\Services\PublicImages::save($m,$bytes);$media[]=$m;
}
$orgs=Organization::where('type','county')->get();$categories=[];
$types=['news','announcement','resolution','event','duty','document','publication','tender','contract','call','page'];
foreach($types as $type)$categories[$type]=Category::create(['organization_id'=>$root->id,'type'=>'news','locale'=>'fa','name'=>'گروه آزمون '.$type,'slug'=>'load-'.$type,'is_active'=>true]);
Member::create(['organization_id'=>$root->id,'name'=>'استاندار آزمایشی','position'=>'استاندار مازندران','kind'=>'governor','locale'=>'fa','is_current'=>true,'is_active'=>true,'media_id'=>$media[0]->id]);
for($i=0;$i<5;$i++)App\Models\Slide::create(['organization_id'=>$root->id,'kind'=>'slide','title'=>'اسلاید آزمون '.$i,'media_id'=>$media[$i]->id,'locale'=>'fa','is_active'=>true,'priority'=>$i]);
$contentRows=[];
for($i=1;$i<=10000;$i++){
 $type=$types[($i-1)%count($types)];$org=$i%3===0?$orgs[$i%count($orgs)]->id:$root->id;
 $contentRows[]=['organization_id'=>$org,'author_id'=>$admin->id,'category_id'=>$categories[$type]->id,'cover_media_id'=>$media[$i%20]->id,'type'=>$type,'locale'=>'fa','title'=>'مطلب آزمون بار '.$i,'slug'=>'load-'.$type.'-'.$i,'excerpt'=>str_repeat('خلاصه خبر آزمون. ',10),'body'=>'<p>'.str_repeat('این متن ساختگی برای آزمون کارایی پرتال است. ',45).'</p>','metadata'=>json_encode(['news_scope'=>['province','counties','crisis'][$i%3]]),'status'=>'published','is_featured'=>$i%20===0,'priority'=>$i%100,'published_at'=>$now->copy()->subMinutes($i),'created_at'=>$now,'updated_at'=>$now];
}
foreach(array_chunk($contentRows,100) as $chunk)DB::table('contents')->insert($chunk);
foreach(['official-main','portal-footer','portal-utility'] as $key){
 $menu=Menu::create(['organization_id'=>$root->id,'key'=>$key,'name'=>'منوی آزمون','locale'=>'fa','is_active'=>true]);
 for($i=0;$i<15;$i++)MenuItem::create(['menu_id'=>$menu->id,'title'=>'پیوند آزمون '.$i,'url'=>'/news','priority'=>$i,'is_active'=>true]);
}
for($i=0;$i<30;$i++){
 Service::create(['organization_id'=>$root->id,'name'=>'خدمت آزمون '.$i,'slug'=>'load-service-'.$i,'description'=>'شرح خدمت آزمایشی','locale'=>'fa','is_active'=>true]);
 Link::create(['organization_id'=>$root->id,'title'=>'پیوند آزمون '.$i,'url'=>'/news','locale'=>'fa','is_active'=>true]);
}
$gallery=Gallery::create(['organization_id'=>$root->id,'title'=>'گالری آزمون','slug'=>'load-gallery','locale'=>'fa','status'=>'published','published_at'=>$now]);
foreach($media as $m)GalleryItem::create(['gallery_id'=>$gallery->id,'media_id'=>$m->id,'title'=>'تصویر آزمون']);
$tickets=[];
foreach($actors as $i=>$actor)for($j=0;$j<5;$j++)$tickets[]=['reference'=>(string)Illuminate\Support\Str::ulid(),'user_id'=>$actor['id'],'organization_id'=>$root->id,'type'=>'governor','subject'=>'درخواست ساختگی '.$j,'body'=>'متن درخواست آزمون کارایی','urgency'=>'low','status'=>'pending','created_at'=>$now,'updated_at'=>$now];
foreach(array_chunk($tickets,200) as $chunk)DB::table('tickets')->insert($chunk);
$governor=App\Models\StaffPortal::whereHas('member',fn($q)=>$q->where('kind','county_governor'))->firstOrFail();
$info=['actors'=>$actors,'admins'=>$admins,'root_id'=>$root->id,'county_id'=>$orgs->first()->county_id,'article'=>Content::where('organization_id',$root->id)->where('type','news')->value('id'),'service'=>Service::first()->id,'gallery'=>$gallery->id,'image'=>$media[0]->url,'governor_path'=>$governor->publicPath(),'resources'=>array_keys(App\Services\ResourceRegistry::all()),'counts'=>['contents'=>Content::count(),'users'=>User::count(),'members'=>Member::count(),'tickets'=>count($tickets)],'report_category'=>config('portal.report_categories')[0]??'other'];
file_put_contents('/tmp/load-fixtures.json',json_encode($info,JSON_UNESCAPED_UNICODE));
$meta=$info;unset($meta['actors'],$meta['admins']);file_put_contents('/tmp/load-meta.json',json_encode($meta,JSON_UNESCAPED_UNICODE));
echo json_encode(['fixture_counts'=>$info['counts'],'article'=>$info['article'],'governor_path'=>$info['governor_path']],JSON_UNESCAPED_UNICODE).PHP_EOL;
