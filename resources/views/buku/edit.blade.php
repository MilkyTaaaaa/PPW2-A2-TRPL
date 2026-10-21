<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    @if ($errors->any())
        <div role="alert">
            <strong>Periksa kembali input berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" maxlength="255" required>
        @error('judul') <span>{{ $message }}</span> @enderror
        <br><br>
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}" maxlength="255" required>
        @error('penulis') <span>{{ $message }}</span> @enderror
        <br><br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ old('harga', $buku->harga) }}" min="0" step="1" required>
        @error('harga') <span>{{ $message }}</span> @enderror
        <br><br>
        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{ old('tgl_terbit', $buku->tgl_terbit?->format('Y-m-d')) }}" required>
        @error('tgl_terbit') <span>{{ $message }}</span> @enderror
        <br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <p><a href="{{ route('buku.index') }}">Kembali</a></p>
</body>
</html>
