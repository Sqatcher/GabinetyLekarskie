<?php

namespace App\Providers;

use App\Helpers\Get;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Get;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.navigation',
            function ($view) {
                $view->with('user_role', $this->getRole(Auth::user()->role));
            }
        );

    }
}
