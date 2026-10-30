<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Api\PublicController;
use App\Services\{PortalView, StaffPortals};
use Illuminate\Http\Request;

final class StaffPublicController
{
    public function __invoke(Request $request, PortalView $ui, PublicController $public, string $slug, ?int $id = null)
    {
        $portal = StaffPortals::resolve($slug);
        $item = $id ? $portal->items()->published()->with('asset')->whereIn('kind', ['news', 'announcement'])->findOrFail($id) : null;
        $tab = $request->query('tab', 'news');
        abort_unless(in_array($tab, ['news', 'announcement', 'gallery', 'video', 'about'], true), 404);
        $home = $public->home($request->duplicate(['locale' => 'fa']))->getData(true)['data'];
        $template = collect($ui->data('frontend')['templates'])->firstWhere('path', '/');
        $page = [...$template, 'id' => 'StaffPublicPage', 'path' => $request->getPathInfo(), 'resource' => '', 'serverRendered' => true, 'controller' => 'site'];
        return view('site.page', ['page' => $page, 'path' => $request->getPathInfo(), 'title' => $item?->title ?? $portal->title,
            'county' => null, 'home' => $home, 'settings' => $home['settings'] ?? [],
            'navigation' => $ui->navigation($home['menus'] ?? [], null, $home['custom_pages'] ?? []),
            'view' => 'staff-portal', 'portal' => $portal, 'staffItem' => $item, 'staffTab' => $tab,
            'staffItems' => $portal->items()->published()->where('kind', $tab)->with('asset')->orderBy('priority')->latest('published_at')->paginate(12)->withQueryString(),
            'staffLinks' => $portal->items()->published()->where('kind', 'link')->with('asset')->orderBy('priority')->get()]);
    }
}
