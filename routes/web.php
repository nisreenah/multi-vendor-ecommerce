<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('banners', BannerController::class);

});

Route::prefix('store')->group(function () {

    Route::get('/', function () {
        return view('store.index');
    });

    Route::get('/login', function () {
        return view('store.auth.login');
    })->name('store.login');

    Route::get('/register', function () {
        return view('store.auth.register');
    })->name('store.register');

    Route::get('/forgot-password', function () {
        return view('store.auth.forgot-password');
    })->name('store.forgot-password');

    Route::get('/reset-password', function () {
        return view('store.auth.reset-password');
    })->name('store.reset-password');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', function () {
            return view('store.profile.account');
        })->name('store.profile');
    });
});

require __DIR__ . '/auth.php';
