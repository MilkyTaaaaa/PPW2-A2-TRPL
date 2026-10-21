<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" id="judul" required><br><br>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" required><br><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" required><br><br>

        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" id="tgl_terbit" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('buku.index') }}">Kembali ke Daftar Buku</a>
    </body>
</html>