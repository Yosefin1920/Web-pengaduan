<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pengaduan\HomeController as PengaduanHomeController;
use App\Http\Controllers\Pengaduan\PengaduanController as PengaduanPengaduanController;
use App\Http\Controllers\Pengaduan\TentangController as PengaduanTentangController;
use App\Http\Controllers\Pengaduan\ProfileController as PengaduanProfileController;

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


// Pengaduan
Route::get('/', [PengaduanHomeController::class, 'index'])->name('pengaduan.home');

Route::get('/Pengaduan', [PengaduanPengaduanController::class, 'index'])->name('pengaduan.pengaduan');
Route::post('/Pengaduan', [PengaduanPengaduanController::class, 'store'])->name('pengaduan.pengaduan-process');

Route::post('/pengaduan/{id}/komentar', [PengaduanPengaduanController::class, 'storeKomentar'])->name('pengaduan.storeKomentar');
Route::post('/pengaduan/{id}/like', [PengaduanPengaduanController::class, 'like'])->name('pengaduan.like');

Route::get('/Pengaduan/{id}', [PengaduanPengaduanController::class, 'detail'])->name('detail.pengaduan');

Route::get('/tentang', [PengaduanTentangController::class, 'index'])->name('pengaduan.tentang');

// Profile
Route::get('/profile', [PengaduanProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [PengaduanProfileController::class, 'profileUpdate'])->name('profile.update');
Route::post('/upload-profile-picture', [PengaduanProfileController::class, 'uploadProfilePicture'])->name('upload.profile.picture');

Route::get('/password', [PengaduanProfileController::class, 'password'])->name('profile.password');
Route::post('/password/update', [PengaduanProfileController::class, 'updatePassword'])->name('password.update');

Route::get('/riwayat', [PengaduanProfileController::class, 'riwayat'])->name('profile.riwayat');


// Auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-process');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register-process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
