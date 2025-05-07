<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'doLogin'])->name('doLogin');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/kelola', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/hewan/create', [PageController::class, 'create'])->name('hewan.create');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::put('/profile/update', [PageController::class, 'update'])->name('profile.update');

// Custom logout menggunakan session manual
Route::post('/logout', function () {
    Session::flush(); // Hapus semua data session
    return redirect()->route('login');
})->name('logout');
