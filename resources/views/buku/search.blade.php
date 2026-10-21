<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencarian Data Buku</title>
</head>
<body>
    <h1>Pencarian Data Buku</h1>

    @if (session('success'))
        <p role="alert">{{ session('success') }}</p>
    @endif

    <form action="{{ route('buku.search') }}" method="GET">
        <label for="keyword">Cari judul atau penulis:</label>
        <input type="search" name="keyword" id="keyword" value="{{ $keyword }}" placeholder="Masukkan kata kunci">
        <button type="submit">Cari</button>
        <a href="{{ route('buku.index') }}">Lihat Semua Buku</a>
    </form>

    <p>Hasil pencarian untuk: <strong>{{ $keyword !== '' ? $keyword : 'Semua buku' }}</strong></p>
    <p><a href="{{ route('buku.create') }}">Tambah Buku</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_buku as $buku)
                <tr>
                    <td>{{ $data_buku->firstItem() + $loop->index }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit?->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Data buku tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $data_buku->links() }}
    </div>
</body>
</html>
