<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('beranda');

// Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
// Route::get('/visi-misi', [HomeController::class, 'visimisi'])->name('visi-misi');
// Route::get('/struktur', [HomeController::class, 'struktur'])->name('struktur');

Route::get('/resgistrasi', [HomeController::class, 'registrasi'])->name('registrasi');
Route::get('/kontak-kami', [HomeController::class, 'kontakkami'])->name('kontak-kami');
// Route::get('/{page}', [HomeController::class, 'page'])->name('page');

Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan-detail', [HomeController::class, 'kegiatandetail'])->name('kegiatan-detail');
Route::get('/berita/{pg}', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{pg}/detail/{slug}', [HomeController::class, 'beritadetail'])->name('beritadetail');

Route::get('/pelayanan/alur-pelaksanaan-pengujian-laboratorium', [HomeController::class, 'pelaksanaan'])->name('pelaksanaan');
Route::get('/pelayanan/sop-alur-pengujian-lapangan', [HomeController::class, 'sop'])->name('sop');

Route::get('/informasi/{page}', [HomeController::class, 'informasi'])->name('informasi');
// Route::get('/informasi-berkala', [HomeController::class, 'berkala'])->name('berkala');
// Route::get('/informasi-serta-merta', [HomeController::class, 'sertamerta'])->name('serta-merta');

Route::get('/galeri/foto', [HomeController::class, 'foto'])->name('foto');
Route::get('/galeri/video', [HomeController::class, 'video'])->name('video');
Route::get('/{pg}/{page}', [HomeController::class, 'page'])->name('page');


