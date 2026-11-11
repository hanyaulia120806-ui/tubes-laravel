
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Halaman login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

// Halaman yang bisa diakses Admin dan Petugas
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/pelanggan/tambah', [HomeController::class, 'create']);
    Route::post('/pelanggan/simpan', [HomeController::class, 'store']);
    Route::get('/pelanggan/edit/{id}', [HomeController::class, 'edit']);
    Route::post('/pelanggan/update/{id}', [HomeController::class, 'update']);
});

// Hanya Admin yang bisa menghapus
Route::post('/pelanggan/hapus/{id}', [HomeController::class, 'destroy'])
    ->middleware(['auth', 'role:admin']);
