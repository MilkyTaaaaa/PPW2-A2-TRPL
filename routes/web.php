<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\BukuController;

Route::get('/login', function () {
    return view('simonika.halaman', [
        'title' => 'Halaman Login SIMONIKA',
        'role' => 'Semua Pengguna',
        'background' => '#799bd6'
    ]);
});

Route::get('/admin', function () {
    return view('simonika.halaman', [
        'title' => 'Dashboard Admin',
        'role' => 'Admin',
        'background' => '#8a2219'
    ]);
});

Route::get('/pamong', function () {
    return view('simonika.halaman', [
        'title' => 'Dashboard Pamong/Dukuh',
        'role' => 'Pamong/Dukuh',
        'background' => '#76e596'
    ]);
});

Route::get('/lurah', function () {
    return view('simonika.halaman', [
        'title' => 'Dashboard Lurah',
        'role' => 'Lurah',
        'background' => '#8e7757'
    ]);
});

Route::get('/kapanewon', function () {
    return view('simonika.halaman', [
        'title' => 'Dashboard Kapanewon',
        'role' => 'Kapanewon',
        'background' => '#8872a0'
    ]);
});

Route::get('/boom', [MencobaController::class, 'boomesport']);

Route::get('/penilaian', [PenilaianController::class, 'index']);

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
