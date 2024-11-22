<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KursiController;

Route::get('/', [TiketController::class, 'index'])->name('home');
Route::get('/pesan/tanggal', [TiketController::class, 'pilihTanggal'])->name('pesan.pilihTanggal');

// Route untuk menampilkan form pemilihan jadwal
Route::get('/pesan/jadwal', [TiketController::class, 'pilihJadwal'])->name('pesan.jadwal');

// Route untuk memproses pemilihan jadwal
Route::post('/pesan/jadwal', [TiketController::class, 'pilihJadwal'])->name('pesan.jadwal');

Route::get('/pesan/kursi/{Id_Jadwal}', [TiketController::class, 'pilihKursi'])->name('pesan.pilihKursi')->middleware('auth');
Route::post('/pesan/kursi', [TiketController::class, 'pesanKursi'])->name('pesan.pilihKursi')->middleware('auth');
Route::get('/pesan/konfirmasi', [TiketController::class, 'konfirmasi'])->name('pesan.konfirmasi');
Route::post('/pesan/konfirmasi', [TiketController::class, 'konfirmasi'])->name('pesan.konfirmasi');
Route::get('/pesanan', [TiketController::class, 'pesanan'])->name('pesan.pesanan')->middleware('auth');
Route::get('/tentang', [TiketController::class, 'tentang'])->name('tentang');

// Route untuk menampilkan form registrasi
Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// Route untuk menyimpan data registrasi
Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/list-data/jadwal', [JadwalController::class, 'listDataJadwal'])->name('list-data.jadwal');
Route::get('/list-data/kursi', [KursiController::class, 'listDataKursi'])->name('list-data.kursi');

require __DIR__ . '/auth.php';
