<?php

namespace App\Providers;

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
        // 모든 view에 대해 사용자 정보 접근 가능
        view()->composer('*', function ($view) {
            $user = auth()->user();
            $view->with('user', $user);
        });
    }
}
