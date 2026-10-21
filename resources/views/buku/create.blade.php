<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    @if ($errors->any())
        <div role="alert" style="padding: 10px; margin-bottom: 12px; color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb;">
            <strong>Periksa kembali input berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" maxlength="255" required>
        @error('judul') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" maxlength="255" required>
        @error('penulis') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" min="0" step="1" required>
        @error('harga') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{ old('tgl_terbit') }}" required>
        @error('tgl_terbit') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ route('buku.index') }}">Kembali ke Daftar Buku</a></p>
</body>
</html>
