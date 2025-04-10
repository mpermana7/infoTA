<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [PageController::class, 'index']);

// Form Login
Route::get('/login', [PageController::class, 'login'])->name('login')->middleware('guest:admin,mahasiswa,dosen');

// Submit Login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('guest:admin,mahasiswa,dosen');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');


// Menuju Halaman Masing - Masing Role

// Admin
Route::get('/admin/beranda', [PageController::class, 'berandaAdmin'])->middleware('auth:admin');
Route::get('/admin/template_dokumen', [PageController::class, 'templateDokumenAdmin'])->middleware('auth:admin');
Route::get('/admin/mahasiswa', [PageController::class, 'mahasiswaAdmin'])->middleware('auth:admin');
Route::get('/admin/dosen', [PageController::class, 'dosenAdmin'])->middleware('auth:admin');
Route::get('/admin/profil', [PageController::class, 'profilAdmin'])->middleware('auth:admin');