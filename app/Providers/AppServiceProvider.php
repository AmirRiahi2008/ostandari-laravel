<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\App\Services\PortalView::class);
    }

    public function boot(): void
    {
        if (
            $this->app->environment('production')
            && str_starts_with((string) config('app.url'), 'https://')
        ) {
            URL::forceScheme('https');
        }

        View::share(
            'ui',
            $this->app->make(\App\Services\PortalView::class)
        );

        RateLimiter::for(
            'api',
            fn (Request $request) => Limit::perMinute(180)
                ->by($request->user()?->id ?: $request->ip())
        );

        RateLimiter::for('auth', fn (Request $request) => [
            Limit::perMinute(10)->by($request->ip()),

            Limit::perMinute(5)->by(hash(
                'sha256',
                (string) $request->input(
                    'login',
                    $request->input('mobile', $request->ip())
                )
            )),
        ]);

        RateLimiter::for('otp', fn (Request $request) => [
            Limit::perMinute(5)->by($request->ip()),

            Limit::perMinute(1)->by(
                'otp:'.hash(
                    'sha256',
                    (string) $request->input('mobile')
                )
            ),
        ]);

        RateLimiter::for(
            'contact',
            fn (Request $request) => Limit::perMinute(3)
                ->by($request->ip())
        );
    }
}