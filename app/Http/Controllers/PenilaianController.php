<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil daftar jabatan untuk dropdown
        $jabatan = Penilaian::select('jabatan')
            ->distinct()
            ->orderBy('jabatan')
            ->pluck('jabatan');

        // Query dasar
        $query = Penilaian::query();

        // Filter berdasarkan jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        // Pencarian berdasarkan nama aparatur
        if ($request->filled('search')) {
            $query->where(
                'nama_aparatur',
                'like',
                '%' . $request->search . '%'
            );
        }

        if (!$request->filled('jabatan') && !$request->filled('search')) {
            $data_penilaian = $query
                ->orderByDesc('id')
                //->take(5)
                ->get();
        } else {
            $data_penilaian = $query
                ->orderByDesc('id')
                ->get();
        }

        // Statistik
        $totalPenilaian = Penilaian::count();
        $totalNilai = Penilaian::sum('nilai');
        $nilaiTertinggi = Penilaian::max('nilai');
        $nilaiTerendah = Penilaian::min('nilai');
        $rataRataNilai = Penilaian::avg('nilai');

        return view('simonika.penilaian', compact(
            'data_penilaian',
            'jabatan',
            'totalPenilaian',
            'totalNilai',
            'nilaiTertinggi',
            'nilaiTerendah',
            'rataRataNilai'
        ));
    }
}