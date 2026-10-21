<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
</head>
<body>
    <h1>Data Buku</h1>

    @if (session('success'))
        <div role="alert" style="padding: 10px; margin-bottom: 12px; color: #155724; background: #d4edda; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div role="alert" style="padding: 10px; margin-bottom: 12px; color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb;">
            <strong>Data belum dapat diproses:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.search') }}" method="GET" style="margin-bottom: 16px;">
        <label for="keyword">Cari judul atau penulis:</label>
        <input type="search" name="keyword" id="keyword" placeholder="Masukkan kata kunci">
        <button type="submit">Cari</button>
    </form>

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
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada data buku.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $data_buku->links() }}
    </div>
</body>
</html>
