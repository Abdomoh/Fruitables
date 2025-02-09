<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Web\SocialiteController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\LandingPageController;
use App\Http\Controllers\Web\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//////// Admin Route  //////////////////////////////////////////////



Route::get('lang/{lang}', [LocalizationController::class, 'index'])->name('lang.switch');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['admin'])->name('dashboard');
Route::prefix('dashboard')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::resource('settings', SettingController::class);
        Route::resource('categoryies', CategorieController::class);
        Route::resource('products', ProductController::class);
    });
    require __DIR__ . '/adminAuth.php';
});
//////  End Route Admin //////////////////////////////////////////////




Route::prefix('')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);

    Route::controller(CartController::class)->middleware('auth')->group(function () {
        Route::post('add-to-cart', 'addProductToCart')->name('cart.store');
        Route::get('cart-product', 'viewCartProduct')->name('cart-product');
        Route::post('/cart-update/{id}', 'updateProductInCart')->name('cart.update');
        Route::post('cart-remove/{id}', 'removeProductInCart')->name('cart.remove');
    });
    Route::controller(OrderController::class)->middleware('auth')->group(function () {
        Route::get('orders', 'viewOrder')->name('orders');
        Route::get('orders/{id}', 'show')->name('orders.show');
    });
    Route::controller(CheckoutController::class)->middleware('auth')->group(function () {
        Route::get('checkout', 'checkout')->name('checkout');
        Route::post('checkout', 'placeOrder')->name('checkout.store');
    });

    Route::controller(SocialiteController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('redirect.google');
        Route::get('auth/google/callback', 'handelGoogleCallback');
        Route::get('auth/facebook', 'redirectToFacebook')->name('redirect.facebook');
        Route::get('auth/facebook/callback', 'handelFacebookCallback');
    });
    require __DIR__ . '/auth.php';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
