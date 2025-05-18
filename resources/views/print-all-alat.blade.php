<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cetak Semua Alat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f7fafc;
        }
        h1 {
            text-align: center;
            color: #2b6cb0;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #e2e8f0;
            padding: 8px 12px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #edf2f7;
            color: #4a5568;
            font-weight: 600;
        }
        td {
            background-color: #ffffff;
            color: #2d3748;
        }
        .no-print {
           display: none;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Cetak Semua Data Alat</h1>

    <p>Total data alat: {{ $alats->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Alat</th>
                <th>Nama Alat</th>
                <th>Lokasi Alat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alats as $index => $alat)
            <tr>
                <td>{{ $index + 1 }}</td>  <!-- Kolom nomor urut -->
                <td>{{ $alat->alat_id }}</td>
                <td>{{ $alat->nama_alat }}</td>
                <td>{{ $alat->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="no-print">
        <button onclick="window.print()">Cetak Halaman</button>
    </div>
</body>
</html>
