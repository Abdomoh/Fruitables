<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
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
        view()->composer('*', function ($view) {
            $setting =  Setting::orderBy('created_at', 'desc')->first();
          $categories = Category::with('products')->get();


            $view->with(['setting' => $setting,'categories'=>$categories]);
        });
    }
}
