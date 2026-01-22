<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

public function boot()
{
    View::composer('*', function ($view) {

        $wishlistCount = 0;
        $cartCount = 0;

        if (Auth::check()) {
            $wishlistCount = DB::table('wishlist')
                ->where('user_id', Auth::id())
                ->count();

            $cartCount = DB::table('addtocart')
                ->where('user_id', Auth::id())
                ->count();
        }

        $view->with([
            'wishlistCount' => $wishlistCount,
            'cartCount' => $cartCount,
        ]);
    });
}

}
