<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireStaff
{
    public function handle(Request $r, Closure $next)
    {
        abort_unless($r->user()?->isStaff(), 403);

        return $next($r);
    }
}
