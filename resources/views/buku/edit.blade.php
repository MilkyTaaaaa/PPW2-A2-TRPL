<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>

<body>
    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}"><br><br>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}"><br><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="{{ $buku->harga }}"><br><br>

        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('buku.index') }}">Kembali</a>

    </body>
</html>