<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencarian Data Buku</title>
</head>
<body>
    <h1>Hasil Pencarian Buku</h1>

    <form action="{{ route('buku.search') }}" method="GET" style="margin-bottom: 16px;">
        <input type="text" name="cari" class="form-control" placeholder="Cari ..." value="{{ $cari }}" style="width: 30%; display: inline; margin-bottom: 10px;">
        <button type="submit">Cari</button>
        <a href="{{ route('buku.index') }}">Kembali</a>
    </form>

    @if (count($data_buku))
        <div style="padding: 10px; margin-bottom: 12px; color: #155724; background: #d4edda; border: 1px solid #c3e6cb;">
            Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong>
        </div>

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
                @foreach ($data_buku as $buku)
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
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 16px;">
            {{ $data_buku->links() }}
        </div>
    @else
        <div style="padding: 10px; margin-bottom: 12px; color: #856404; background: #fff3cd; border: 1px solid #ffeeba;">
            Data {{ $cari }} tidak ditemukan.
        </div>
        <a href="{{ route('buku.index') }}">Kembali</a>
    @endif
</body>
</html>