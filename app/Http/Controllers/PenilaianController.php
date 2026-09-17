<?php

namespace App\Http\Controllers;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('simonika.halaman', [
            'title' => 'Penilaian Kinerja SIMONIKA',
            'role' => 'Admin',
            'background' => '#e8f0fe'
        ]);
    }
}