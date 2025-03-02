<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            $date =   Carbon::now();
            $setting =  Setting::orderBy('created_at', 'desc')->first();
            $categories = Category::with('products')->get();
            $countCart = Cart::where('user_id', Auth::user()->id ?? '')->count();
            $total = Cart::where('user_id', Auth::user()->id ?? '')->sum('total');

            $categoryies_count = Category::count();
            $products_count = Product::count();
            $orders_count = Order::count();
            $approved_order = Order::where('status', 'completed')->count();
            $wetting_order = Order::where('status', 'panding')->count();
            $cash_order = Order::where('payment_method', '0')->count();
            $total_order_daily = Order::where('created_at', now())->sum('total');
            $total_order_monthly = Order::where('created_at', $date)->sum('total');


            $view->with([
                'setting' => $setting,
                'categories' => $categories,
                'countCart' => $countCart,
                'total' => $total,
                'categoryies_count' => $categoryies_count,
                'products_count' => $products_count,
                'orders_count'=>$orders_count,
                'approved_order' => $approved_order,
                'wetting_order' => $wetting_order,
                'cash_order' => $cash_order,
                'total_order_daily' => $total_order_daily,
                'total_order_monthly' => $total_order_monthly

            ]);
        });
    }
}
