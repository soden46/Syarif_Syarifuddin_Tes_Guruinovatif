<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Artisan;

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
// Memanggil Storage Link
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

// Route Halaman Awal
Route::get('/', [ProjectController::class, 'index'])->name('index');
// Route Cari Data Proyek/Pegawai
Route::get('/cari', [ProjectController::class, 'index'])->name('cari');
// Route Form Tambah Proyek/Pegawai Ke Database
Route::get('/tambah', [ProjectController::class, 'tambahpegawai'])->name('tambah');
// Route Menyimpan Data Dari Form Tambah Proyek/Pegawai Ke Database
Route::post('/insert', [ProjectController::class, 'insertdata'])->name('insert');
// Route Form Edit Proyek/Pegawai Ke Database
Route::get('/edit/{id}', [ProjectController::class, 'editdata'])->name('edit');
// Route Menyimpan Data Form Edit Proyek/Pegawai Ke Database
Route::post('/update/{id}', [ProjectController::class, 'updatedata'])->name('update');
// Route Hapus Data
Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
