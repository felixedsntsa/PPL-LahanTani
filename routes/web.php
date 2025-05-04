<?php

use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Cabang;
use App\Http\Controllers\C_Profil;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.landing');
})->name('landing');

// login
Route::get('/login', [C_Login::class , 'masuk'])->name('login');
Route::post('/login', [C_Login::class, 'proses'])->name('login.proses');

// DASHBOARD ADMIN
Route::get('/admin/dashboard', function () {
    return view('admin.dashadmin');
})->middleware('auth');

// DASHBOARD CABANG
Route::get('/cabang/dashboard', function () {
    return view('cabang.dashcabang');
})->middleware('auth:cabang');


// LOGOUT
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');
Route::post('/logout/cabang', [C_Login::class, 'logoutCabang'])->name('logout.cabang');

// AKUN CABANG -- ADMIN
Route::get('/admin/akun-cabang', [C_Profil::class, 'index'])->middleware('auth')->name('admin.akuncabang');
Route::post('/admin/akun-cabang', [C_Profil::class, 'store'])->name('admin.akuncabang.store')->middleware('auth');
Route::get('/cabang/{id}', [C_Cabang::class, 'show'])->name('cabang.show');

// PROFIL ADMIN
Route::get('/profil', function () {
    return view('admin.profil', [
        'user' => Auth::user()
    ]);
})->middleware('auth')->name('profil');
Route::get('/profil/edit', [C_Profil::class, 'editProfil'])->name('profil.edit');
Route::post('/profil/update', [C_Profil::class, 'updateProfil'])->name('profil.update');

// PROFIL CABANG
Route::get('/profil', [C_Cabang::class, 'profil'])->middleware('auth:cabang')->name('cabang.profil');
Route::get('/cabang/profil/edit', [C_Cabang::class, 'editProfilCabang'])->name('cabang.profil.edit');
Route::post('/cabang/profil/update', [C_Cabang::class, 'updateProfilCabang'])->name('cabang.profil.update');


