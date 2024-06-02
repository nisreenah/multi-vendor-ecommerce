<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/store', function () {
    return view('store.index');
});

Route::get('/store/login', function () {
    return view('store.auth.login');
})->name('store.login');

Route::get('/store/register', function () {
    return view('store.auth.register');
})->name('store.register');

Route::get('/store/forgot-password', function () {
    return view('store.auth.forgot-password');
})->name('store.forgot-password');

Route::get('/store/reset-password', function () {
    return view('store.auth.reset-password');
})->name('store.reset-password');

Route::get('/store/profile', function () {
    return view('store.profile.account');
})->name('store.profile.account');


require __DIR__.'/auth.php';
