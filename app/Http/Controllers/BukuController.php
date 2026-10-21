<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    private function validationRules(): array
    {
        return [
            'judul' => ['required', 'string'],
            'penulis' => ['required', 'string', 'max:30'],
            'harga' => ['required', 'numeric'],
            'tgl_terbit' => ['required', 'date'],
        ];
    }

    private function validationMessages(): array
    {
        return [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Nama penulis harus berupa teks.',
            'penulis.max' => 'Nama penulis maksimal 30 karakter.',
            'harga.required' => 'Harga buku wajib diisi.',
            'harga.numeric' => 'Harga buku harus berupa angka.',
            'tgl_terbit.required' => 'Tanggal terbit wajib diisi.',
            'tgl_terbit.date' => 'Tanggal terbit harus berupa tanggal yang valid.',
        ];
    }

    public function index()
    {
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);

        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku'));
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->cari;
        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')
            ->orWhere('penulis', 'like', '%' . $cari . '%')
            ->orderBy('id', 'desc')
            ->paginate($batas);
        $jumlah_buku = Buku::count();
        $no = $batas * ($data_buku->currentPage() - 1);

        return view('buku.search', compact('jumlah_buku', 'data_buku', 'no', 'cari'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->validationRules(),
            $this->validationMessages()
        );

        Buku::create($validated);

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Simpan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            $this->validationRules(),
            $this->validationMessages()
        );

        $buku = Buku::findOrFail($id);
        $buku->update($validated);

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Update');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Hapus');
    }
}