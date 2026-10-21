<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <h1>Tambah Buku</h1>

    @if ($errors->any())
        <div role="alert" style="padding: 10px; margin-bottom: 12px; color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb;">
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
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
        <br><br>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" required>
        <br><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required>
        <br><br>

        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="text" name="tgl_terbit" id="tgl_terbit" class="date form-control" value="{{ old('tgl_terbit') }}" placeholder="yyyy/mm/dd" required>
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ route('buku.index') }}">Kembali ke Daftar Buku</a></p>

    <script>
        $(function () {
            $('.date').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true
            });
        });
    </script>
</body>
</html>