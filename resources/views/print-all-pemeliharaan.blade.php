<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cetak Semua Data Pemeliharaan</title>
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
            text-align: center;
            margin-top: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Semua Data Pemeliharaan Alat</h1>

    <p>Total data pemeliharaan: {{ $pemeliharaans->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Alat</th>
                <th>Nama Alat</th>
                <th>Lokasi Alat</th>
                <th>Tanggal Pemeliharaan</th>
                <th>Uraian Pemeliharaan</th>
                <th>Kondisi Setelah Pemeliharaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemeliharaans as $index => $pemeliharaan)
            <tr>
                <td>{{ $index + 1 }}</td>  <!-- Kolom nomor urut -->
                <td>{{ optional($pemeliharaan->alat)->alat_id ?? 'N/A' }}</td>
                <td>{{ optional($pemeliharaan->alat)->nama_alat ?? 'N/A' }}</td>
                <td>{{ optional($pemeliharaan->alat)->lokasi ?? 'N/A' }}</td>
                <td>{{ $pemeliharaan->tanggal }}</td>
                <td>{{ $pemeliharaan->uraian_pemeliharaan }}</td>
                <td>{{ $pemeliharaan->kondisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
