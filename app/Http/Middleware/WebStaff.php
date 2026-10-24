<?php

namespace App\Http\Middleware;

use App\Services\Workspace;
use Closure;
use Illuminate\Http\Request;

final class WebStaff
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) return redirect('/panel/admin/login?error=auth_required&return='.rawurlencode($request->getRequestUri()));
        abort_unless($request->user()->is_active && $request->user()->isStaff(), 403, 'این حساب به پنل مدیریت دسترسی ندارد.');
        Workspace::assertUser($request->user());
        return $next($request);
    }
}
