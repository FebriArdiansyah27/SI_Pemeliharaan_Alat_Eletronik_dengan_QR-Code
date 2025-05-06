<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Alat - {{ $alat->nama_alat }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2d3748;
        }
        .container {
            max-width: 90%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            border:#000000 1px solid;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2b6cb0;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }
        .alat-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            gap: 40px;
            align-items: center;
        }
        .qr-code svg {
            max-width: 120px;
            max-height: 120px;
        }
        .info-column {
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
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

<div class="container">
    <h1>Informasi Alat</h1>

    <div class="alat-card">
        <div class="qr-code">
            @if (!empty($alat->alat_id))
            {!! QrCode::size(120)->generate(url('/informasi-pemeliharaan-alat/' . $alat->alat_id)) !!}
            @else
                <p class="text-gray-500">QR Code belum tersedia</p>
            @endif
        </div>
        <div class="info-column">
            <table>
                <tr><th>ID Alat</th><td>{{ $alat->alat_id }}</td></tr>
                <tr><th>Nama Alat</th><td>{{ $alat->nama_alat }}</td></tr>
                <tr><th>Lokasi</th><td>{{ $alat->lokasi }}</td></tr>
            </table>
        </div>
    </div>

    <div class="no-print">
        <button onclick="window.print()">Cetak Halaman</button>
    </div>
</div>

</body>
</html>
