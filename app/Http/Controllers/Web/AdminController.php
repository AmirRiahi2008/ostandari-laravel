<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Api\SystemController;
use App\Services\PortalView;
use App\Services\Workspace;
use Illuminate\Http\Request;

final class AdminController
{
    public function county(Request $request, string $slug, PortalView $ui)
    {
        $county=$ui->county($slug);$context=Workspace::context($request->user());
        abort_unless($county && $context['type']==='county' && $context['county']['slug']===$county['slug'],403);
        return $this->render($request, $ui, '/county-admin/'.$county['slug'], '/panel/admin');
    }

    public function show(Request $request, PortalView $ui, ?string $path=null)
    {
        $full='/panel/admin'.($path?'/'.trim($path,'/'):'');
        if ($full==='/panel/admin' && Workspace::context($request->user())['type']==='county') return redirect(Workspace::context($request->user())['dashboard_path']);
        if ($full==='/panel/admin/organization-contact/new') return redirect('/panel/admin/organization-contact');
        return $this->render($request,$ui,$full,$full);
    }

    private function render(Request $request, PortalView $ui, string $path, string $modulePath)
    {
        $user=$request->user();$context=Workspace::context($user);$meta=$ui->data('frontend');
        $module=null;$mode=null;$id=null;$reference=null;
        if(preg_match('~^(/panel/admin/reports)/([^/]+)/edit$~',$modulePath,$report)){ $modulePath=$report[1];$reference=$report[2]; }
        elseif(preg_match('~^(.+)/(new)$~',$modulePath,$editor)){ $modulePath=$editor[1];$mode='create'; }
        elseif(preg_match('~^(.+)/([^/]+)/edit$~',$modulePath,$editor)){ $modulePath=$editor[1];$id=$editor[2];$mode='edit'; }
        $module=collect($meta['modules'])->firstWhere('path',$modulePath);
        if($module) abort_unless($ui->moduleAllowed($module,$user),403);
        $utility=['/panel/admin/account'=>'حساب کاربری','/panel/admin/logout'=>'خروج از مدیریت'];
        abort_unless($module || $modulePath==='/panel/admin' || isset($utility[$modulePath]),404);
        if($mode){
            abort_unless(!empty($module['page']),404);
            if(!$context['can_write'])return redirect($modulePath);
            abort_unless($mode==='create'?$module['canCreate']:$module['canEdit'],403);
            abort_if($mode==='create'&&!$context['is_global']&&in_array($module['resource'],['organizations','counties'],true),403);
        }
        $base=collect($meta['templates'])->firstWhere('path','/panel/admin');
        $page=$module['page'] ?? $base;
        $page=[...$page,'path'=>$path,'controller'=>'admin'];
        if($mode)$page['editor']=['mode'=>$mode,'id'=>$id,'returnTo'=>$modulePath];
        $title=$module['title'] ?? $utility[$modulePath] ?? ($context['type']==='county'?'داشبورد فرمانداری '.$context['county']['name']:'داشبورد استانداری');
        $content=$mode?'editor':($reference?'reports':($modulePath==='/panel/admin'?'dashboard':(!empty($module['page'])?'list':'utility')));
        if($modulePath==='/panel/admin/reports')$content='reports';
        $stats=null;
        if($content==='dashboard'){abort_unless($user->hasPermission('dashboard.view'),403);$stats=app(SystemController::class)->dashboard($request)->getData(true)['data'];}
        return view('admin.page',compact('page','path','modulePath','module','mode','id','reference','title','content','context','stats')+['user'=>$user,'modules'=>array_values(array_filter($meta['modules'],fn($m)=>$ui->moduleAllowed($m,$user)))]);
    }
}
