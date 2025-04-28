<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
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
Route::get('/download/{filename}', function ($filename) {
    $path = storage_path('app/public/dokumen_template/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->download($path);
});


// Admin Notifikasi
Route::post('/notification/{id}/read', function ($id) {
    $notification = \Illuminate\Support\Facades\DB::table('notifications')->where('id', $id);
    $notification->update([
        'read_at' => \Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'),
    ]);

    $dataArray = json_decode($notification->firstOrFail()->data, true);

    if (isset($dataArray['template_dokumen_id'])) {
        return redirect('/admin/template_dokumen');
    }
    return back();
})->middleware('auth:admin');
Route::post('/admin/notifications/sudah-dibaca', [AdminController::class, 'SudahDibaca'])->name('admin.notifications.read')->middleware('auth:admin');
Route::post('/admin/notifications/hapus-semua', [AdminController::class, 'HapusSemua'])->name('admin.notifications.drop')->middleware('auth:admin');

// CRUD Pada Role Admin
Route::get('/admin/beranda', [AdminController::class, 'JumlahData'])->middleware('auth:admin');

Route::post('/admin/template_dokumen', [AdminController::class, 'TambahDataDokumenTemplate'])->name('template.tambah')->middleware('auth:admin');
Route::get('/admin/template_dokumen', [AdminController::class, 'MenampilkanDataDokumenTemplate'])->middleware('auth:admin');
Route::get('/admin/template_dokumen/hapus/{id}', [AdminController::class, 'HapusDataDokumenTemplate'])->name('template.hapus')->middleware('auth:admin');
Route::post('/admin/template_dokumen/edit/{id}', [AdminController::class, 'EditDataDokumenTemplate'])->name('template.edit')->middleware('auth:admin');

Route::post('/admin/dosen', [AdminController::class, 'TambahDataDosen'])->name('dosen.tambah')->middleware('auth:admin');
Route::get('/admin/dosen', [AdminController::class, 'MenampilkanDataDosen'])->middleware('auth:admin');
Route::post('/admin/dosen/edit/{id}', [AdminController::class, 'EditDataDosen'])->name('dosen.edit')->middleware('auth:admin');
Route::get('/admin/dosen/hapus/{id}', [AdminController::class, 'HapusDataDosen'])->name('dosen.hapus')->middleware('auth:admin');
Route::post('/admin/dosen/GantiKataSandi/{id}', [AdminController::class, 'GantiKataSandiDosen'])->name('dosen.GantiKataSandi')->middleware('auth:admin');

Route::post('/admin/mahasiswa', [AdminController::class, 'TambahDataMahasiswa'])->name('mahasiswa.tambah')->middleware('auth:admin');
Route::get('/admin/mahasiswa', [AdminController::class, 'MenampilkanDataMahasiswa'])->middleware('auth:admin');
Route::post('/admin/mahasiswa/edit/{id}', [AdminController::class, 'EditDataMahasiswa'])->name('mahasiswa.edit')->middleware('auth:admin');
Route::get('/admin/mahasiswa/hapus/{id}', [AdminController::class, 'HapusDataMahasiswa'])->name('mahasiswa.hapus')->middleware('auth:admin');
Route::post('/admin/mahasiswa/GantiKataSandi/{id}', [AdminController::class, 'GantiKataSandiMahasiswa'])->name('mahasiswa.GantiKataSandi')->middleware('auth:admin');

Route::post('/admin/profil/editFoto/{id}', [AdminController::class, 'EditFotoAdmin'])->name('admin.editFoto')->middleware('auth:admin');
Route::post('/admin/profil/gantiKataSandi/{id}', [AdminController::class, 'GantiKataSandiAdmin'])->name('admin.gantiKataSandi')->middleware('auth:admin');