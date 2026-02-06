<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestimoniController;

/*
|--------------------------------------------------------------------------
| HALAMAN UMUM (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('home');
Route::get('/tentang', fn () => view('tentang'))->name('tentang');
Route::get('/galeri', fn () => view('galeri'))->name('galeri');
Route::get('/kontak', fn () => view('kontak'))->name('kontak');

/*
|--------------------------------------------------------------------------
| PAKET (FRONTEND)
|--------------------------------------------------------------------------
| guest | user | admin ➜ boleh lihat
*/
Route::get('/paket', [PaketController::class, 'userIndex'])
    ->name('paket.user');

Route::get('/paket/{paket}', [PaketController::class, 'show'])
    ->name('paket.show');

/*
|--------------------------------------------------------------------------
| TESTIMONI
|--------------------------------------------------------------------------
*/
// LIHAT TESTIMONI (SEMUA)
Route::get('/testimoni', [TestimoniController::class, 'index'])
    ->name('testimoni.index');

// USER SAJA
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/testimoni/create', [TestimoniController::class, 'create'])
        ->name('testimoni.create');

    Route::post('/testimoni', [TestimoniController::class, 'store'])
        ->name('testimoni.store');

    Route::get('/testimoni/{testimoni}/edit', [TestimoniController::class, 'edit'])
        ->name('testimoni.edit');

    Route::put('/testimoni/{testimoni}', [TestimoniController::class, 'update'])
        ->name('testimoni.update');

    Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroy'])
        ->name('testimoni.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('paket', PaketController::class);
    });
