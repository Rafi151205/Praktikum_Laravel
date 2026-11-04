<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\SuratMasukController;
use App\http\Controllers\SuratKeluarController;
use App\Http\Controllers\Auth\LoginController;

//Route::get('/', function () {
   // return view('welcome');
//});

 //route dasar
 /*Route::get('/surat-masuk', function () {
    return 'Halaman Surat Masuk';
});

 //route dengan parameter
 Route::get('/surat-masuk/{id}', function ($id) {
    return 'Detail surat masuk dengan ID:' .$id;
});

//named route
Route::get('/surat-masuk', function () {
    return 'Halaman Surat Masuk';
})->name('surat-masuk.index');

Route::get('/surat-masuk/{id}', function ($id) {
    return 'Detail surat masuk dengan ID:' .$id;
})->name('surat-masuk.show');*/

//route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
//route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');

//Route::get('/', function () {
 //   return view('dashboard');
//})->name('dashboard');

// Route untuk pengguna yang belum login
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');

});

// Route untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    
    // Pengelolaan surat hanya untuk petugas
    // Daftarkan dahulu agar create tidak dianggap sebagai ID
    Route::resource('surat-masuk', SuratMasukController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-masuk' => 'id'])
        ->middleware('can:manage-letters');

    // Daftar dan detail surat bisa dibuka semua pengguna login
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-masuk' => 'id']);

});

//Route::resource('surat-masuk', SuratMasukController::class)->parameters(['surat-masuk' => 'id']);
Route::resource('surat-keluar', SuratKeluarController::class)->parameters(['surat-keluar' => 'id']);

  