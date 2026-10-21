<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
</head>
<body>
    @if (session('pesan'))
        <div role="alert" style="padding: 10px; margin-bottom: 12px; color: #155724; background: #d4edda; border: 1px solid #c3e6cb;">
            {{ session('pesan') }}
        </div>
    @endif

    <h1>Data Buku</h1>

    <form action="{{ route('buku.search') }}" method="GET" style="margin-bottom: 16px;">
        <input type="text" name="cari" class="form-control" placeholder="Cari ..." style="width: 30%; display: inline; margin-bottom: 10px;">
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
                    <td>{{ $no + $loop->iteration }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>Rp {{ number_format($buku->harga, 0, ',', '.') }},00</td>
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
    <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
</body>
</html>