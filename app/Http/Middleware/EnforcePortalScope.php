<?php

namespace App\Http\Middleware;

use App\Services\Workspace;
use Closure;
use Illuminate\Http\Request;

final class EnforcePortalScope
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user?->isStaff()) {
            Workspace::assertUser($user);
            abort_if(! $request->isMethodSafe() && $user->hasReadOnlyWorkspace() &&
                ! ($request->routeIs('admin.annual-slogan.update', 'web.admin.annual-slogan.update') && Workspace::mayManageAnnualSlogan($user)), 403, 'پنل روابط عمومی استانداری فقط‌خواندنی است.');
        }
        return $next($request);
    }
}
