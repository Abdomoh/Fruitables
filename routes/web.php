<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Website\SocialiteController;
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
        Route::resource('products',ProductController::class);
    });

    require __DIR__ . '/adminAuth.php';
});



//////  End Route Admin //////////////////////////////////////////////



Route::get('/', function () {
    return view('index');
});

//////// Socilaite Route
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handelGoogleCallback']);
Route::get('auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('redirect.facebook');
Route::get('auth/facebook/callback', [SocialiteController::class, 'handelFacebookCallback']);

//////////
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
