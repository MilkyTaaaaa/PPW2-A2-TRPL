<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;
use App\Http\Controllers\PenilaianController;

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