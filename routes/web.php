<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

Route::group(['middleware'=>['auth'] ],function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('anggotas', App\Http\Controllers\AnggotaController::class);
    Route::resource('genres', App\Http\Controllers\GenreController::class);
    Route::resource('teams', App\Http\Controllers\TeamController::class);
    Route::resource('pemesanans', App\Http\Controllers\PemesananController::class);
    Route::get('/pemesanans/terima/{id}', [PemesananController::class, 'terima'])->name('pemesanans.terima');
    Route::get('/pemesanans/tolak/{id}', [PemesananController::class, 'tolak'])->name('pemesanans.tolak');
    Route::POST('/pemesanans/set-tim/{id}', [PemesananController::class, 'setTim'])->name('pemesanans.setTim');

});
Auth::routes();



