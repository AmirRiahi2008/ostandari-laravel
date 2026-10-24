<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\App\Services\PortalView::class);
    }

    public function boot(): void
    {
        \Illuminate\Support\Facades\View::share('ui', $this->app->make(\App\Services\PortalView::class));
        RateLimiter::for('api', fn (Request $r) => Limit::perMinute(180)->by($r->user()?->id ?: $r->ip()));
        RateLimiter::for('auth', fn (Request $r) => [Limit::perMinute(10)->by($r->ip()), Limit::perMinute(5)->by(hash('sha256', (string) $r->input('login', $r->input('mobile', $r->ip()))))]);
        RateLimiter::for('otp', fn (Request $r) => [Limit::perMinute(5)->by($r->ip()), Limit::perMinute(1)->by('otp:'.hash('sha256', (string) $r->input('mobile')))]);
        RateLimiter::for('contact', fn (Request $r) => Limit::perMinute(3)->by($r->ip()));
    }
}
