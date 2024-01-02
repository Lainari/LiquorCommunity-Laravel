<?php

namespace App\Providers;
use Inertia\Inertia;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });
        // 모든 view에 대해 사용자 정보 접근 가능
        view()->composer('*', function ($view) {
            $user = auth()->user();
            $view->with('user', $user);
        });
        
    }
}
