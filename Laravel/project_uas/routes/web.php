<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
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
    return view('login');
})->name('login');

Route::get('dashboard',[DashboardController::class, 'index'])
->middleware('auth')->name('dashboard');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');

Route::middleware('auth')->group(function () {

    Route::post('/logout',[UserController::class,'logout'
    ])->name('logout');

    Route::resource('user', UserController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('kategori', KategoriController::class);
});
