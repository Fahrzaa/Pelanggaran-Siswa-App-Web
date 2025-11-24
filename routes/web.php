<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\WeatherController;

Route::get('/', [IndexController::class, 'index'])->name("index");
Route::get('/login', [AuthController::class, 'kepalapentil'])->name('login');
Route::get('/regis', [IndexController::class, 'regis']);
Route::get('/dashboard', [IndexController::class, 'dashboard'])->middleware('auth')->name("dashboard");
Route::get('/list-siswa', [IndexController::class, 'list'])->middleware('auth');

// Kelas
Route::get('/kelas', [KelasController::class, 'daftarKelas'])->middleware('auth')->name("kelas");
Route::get('/tambah-kelas', [KelasController::class, 'tambahKelas'])->middleware("auth")->name("tambah-kelas");
Route::post('/tambah-kelas/store', [KelasController::class, 'store'])->middleware("auth");
Route::delete('/tambah-kelas/delete/{id}', [KelasController::class, 'destroy'])->middleware("auth");

// Siswa
Route::get('/list-siswa/{id}', [KelasController::class, 'listSiswa'])->middleware("auth")->name("list-siswa");
Route::get('/tambah-siswa', [KelasController::class, 'tambahSiswa'])->middleware("auth");
Route::get('/update-siswa/{id}', [KelasController::class, 'updateSiswa'])->middleware("auth")->name("update-siswa");
Route::put('/update-siswa/store/{id}', [KelasController::class, 'upsiswaStore'])->middleware("auth");
Route::post('/tambah-siswa/store', [KelasController::class, 'storeSiswa'])->middleware("auth");
Route::delete('/tambah-siswa/delete/{id}', [KelasController::class, 'destroySiswa'])->middleware("auth");

// Pelanggaran
Route::get('/pelanggaran', [KelasController::class, 'tes'])->middleware('auth')->name("pelanggaran");
Route::get('/pelanggaran/add', [PelController::class, 'tambahPel'])->middleware('auth')->name("tambahPel");
Route::get('/pelanggaran/edit/{id}', [PelController::class, 'editPel'])->middleware('auth')->name('editPel');
Route::delete('/pelanggaran/hapus/{id}', [PelController::class, 'destroy'])->middleware('auth');
Route::post('/pelanggaran/store', [PelController::class, 'store']);

// Auth
Route::post('/regis/submit', [AuthController::class, 'regisSubmit']);
Route::post('/login/submit', [AuthController::class, 'loginSubmit']);
Route::get('/logout', [AuthController::class, 'keluar'])->name("logout");

// Tambah poin
Route::get('/siswa/{id}/tambah-poin', [KelasController::class, 'formTambahPoin'])->name('form-tambah-poin');
Route::post('/siswa/{id}/tambah-poin', [KelasController::class, 'tambahPoin'])->name('tambah-poin');

// Riwayat
Route::get('/pelanggaran/riwayat', [KelasController::class, 'riwayat'])->name('riwayat');
Route::delete('/riwayat/delete/{id}', [KelasController::class, 'destroyRiwayat'])->name('riwayat');

// Pengaturan Yhoai
Route::get('/pengaturan', [SetController::class, 'pengaturan'])->name('pengaturan');
Route::put('/pengaturan/update', [SetController::class, 'pengaturanUpdate'])->name('pengaturan');

// Weather API test
Route::get('/weather', [WeatherController::class, 'index']);
