
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Penilaian Kinerja SIMONIKA</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f1f1f1;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Penilaian Kinerja SIMONIKA</h1>

    {{-- Filter Jabatan --}}
    <form method="GET" action="{{ url('/penilaian') }}">

        <select name="jabatan" onchange="this.form.submit()">

            <option value="">Semua Jabatan</option>

            @foreach ($jabatan as $namaJabatan)

                <option value="{{ $namaJabatan }}"
                    {{ request('jabatan') == $namaJabatan ? 'selected' : '' }}>
                    {{ $namaJabatan }}
                </option>

            @endforeach

        </select>

        @if (request('search'))
            <input
                type="hidden"
                name="search"
                value="{{ request('search') }}"
            >
        @endif

    </form>

    <br>

    <form method="GET" action="{{ url('/penilaian') }}">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama aparatur"
        >

        @if (request('jabatan'))
            <input
                type="hidden"
                name="jabatan"
                value="{{ request('jabatan') }}"
            >
        @endif

        <button type="submit">Cari</button>

    </form>

    <br>

    {{-- Pesan jika data tidak ditemukan --}}
    @if ($data_penilaian->isEmpty())

        <p>Data penilaian tidak ditemukan.</p>

    @else

        {{-- Tabel Penilaian --}}
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Aparatur</th>
                    <th>Jabatan</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($data_penilaian as $index => $penilaian)

                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $penilaian->nama_aparatur }}</td>
                        <td>{{ $penilaian->jabatan }}</td>
                        <td>{{ $penilaian->nilai }}</td>
                        <td>{{ $penilaian->keterangan }}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>

    @endif

    <h2>Statistik Penilaian</h2>

    <p>Total Penilaian: {{ $totalPenilaian }}</p>
    <p>Total Nilai: {{ $totalNilai }}</p>
    <p>Nilai Tertinggi: {{ $nilaiTertinggi }}</p>
    <p>Nilai Terendah: {{ $nilaiTerendah }}</p>
    <p>Rata-rata Nilai: {{ number_format($rataRataNilai, 2) }}</p>

</div>

</body>
</html>
