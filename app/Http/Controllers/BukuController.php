<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BukuController extends Controller
{
    private function validationMessages(): array
    {
        return [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'judul.max' => 'Judul buku maksimal 255 karakter.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Nama penulis harus berupa teks.',
            'penulis.max' => 'Nama penulis maksimal 255 karakter.',
            'harga.required' => 'Harga buku wajib diisi.',
            'harga.integer' => 'Harga buku harus berupa bilangan bulat.',
            'harga.min' => 'Harga buku tidak boleh kurang dari 0.',
            'tgl_terbit.required' => 'Tanggal terbit wajib diisi.',
            'tgl_terbit.date' => 'Tanggal terbit harus berupa tanggal yang valid.',
        ];
    }

    private function validatedBookData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'tgl_terbit' => ['required', 'date'],
        ], $this->validationMessages());
    }

    public function index()
    {
        $data_buku = Buku::orderBy('id')->paginate(10);

        return view('buku.index', compact('data_buku'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => ['nullable', 'string', 'max:255'],
        ], [
            'keyword.string' => 'Kata pencarian harus berupa teks.',
            'keyword.max' => 'Kata pencarian maksimal 255 karakter.',
        ]);

        $keyword = trim((string) $request->input('keyword', ''));

        $data_buku = Buku::query()
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('judul', 'like', '%' . $keyword . '%')
                        ->orWhere('penulis', 'like', '%' . $keyword . '%');
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('buku.search', compact('data_buku', 'keyword'));
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
        $validated = $this->validatedBookData($request);

        Buku::create($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validatedBookData($request);
        $buku = Buku::findOrFail($id);
        $buku->update($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}
