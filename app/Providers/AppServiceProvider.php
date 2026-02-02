<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $wishlistCount = 0;
            $cartCount = 0;
            $order = null;

            if (Auth::check()) {

                $userId = Auth::id();

                $wishlistCount = DB::table('wishlist')
                    ->where('user_id', $userId)
                    ->count();

                $cartCount = DB::table('addtocart')
                    ->where('user_id', $userId)
                    ->count();

                // ✅ LATEST ORDER (SAFE)
                $order = DB::table('tbl_orders')
                    ->where('o_user_id', $userId)
                    ->latest('o_created_at')
                    ->first();
            }

            $view->with([
                'wishlistCount' => $wishlistCount,
                'cartCount' => $cartCount,
                'order' => $order, // ✅ IMPORTANT
            ]);
        });
    }
}
