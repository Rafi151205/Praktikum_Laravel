<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\SuratMasukController;
use App\http\Controllers\SuratKeluarController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('surat-masuk', SuratMasukController::class)->parameters(['surat-masuk' => 'id']);
Route::resource('surat-keluar', SuratKeluarController::class)->parameters(['surat-keluar' => 'id']);

  