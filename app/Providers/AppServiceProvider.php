<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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

        Paginator::useBootstrap();
        
        view()->composer('*', function ($view) {
            $setting =  Setting::orderBy('created_at', 'desc')->first();
            $categories = Category::with('products')->get();
            $countCart = Cart::where('user_id', Auth::user()->id ?? '')->count();
            $total = Cart::where('user_id', Auth::user()->id ?? '')->sum('total');


            $view->with(['setting' => $setting, 'categories' => $categories, 'countCart' => $countCart, 'total' => $total]);
        });
    }
}
