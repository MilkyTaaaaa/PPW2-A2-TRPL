<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>

<body>

    <h1>Data Buku</h1>

    <a href="{{ route('buku.create') }}">Tambah Buku</a>

    <table border="1" cellpadding="8">
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
            @foreach ($data_buku as $index => $buku)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                    <td>{{ date('d/m/Y', strtotime($buku->tgl_terbit)) }}</td>

                    <td>
                        <form action="{{ route('buku.edit', $buku->id) }}" method="GET" style="display:inline;">
                            <button type="submit">Edit</button>
                        </form>

                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>