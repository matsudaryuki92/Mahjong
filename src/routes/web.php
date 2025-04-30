<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
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

//認証機能
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

//雀荘マップ機能
Route::prefix('mahjong')->name('mahjong.')->middleware('auth')->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('index');
    Route::get('/search', [StoreController::class, 'search'])->name('search');
    Route::get('/store-info/{id}', [StoreController::class, 'show'])->name('store.info');
});

//プロフィール設定機能
Route::prefix('mahjong')->name('mahjong.')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});