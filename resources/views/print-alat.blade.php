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
            max-width: 70%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            border:#000000 1px solid;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #2b6cb0;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 600;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 20px;
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
        tr:hover {
            background-color: #f7fafc;
        }
        .empty-message {
            color: #718096;
            font-size: 1rem;
        }
        .qr-code svg {
            max-width: 150px;
            max-height: 150px;
        }
        .flex-container {
            display: flex;
            gap: 40px;
            margin-top: 20px;
        }
        .qr-column {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .info-column {
            flex: 2;
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

    <div class="flex-container">
        <div class="qr-column">
            <div class="qr-code">
                @if (!empty($alat->alat_id))
                    {!! QrCode::size(150)->generate($alat->alat_id) !!}
                @else
                    <p class="text-gray-500">QR Code belum tersedia</p>
                @endif
            </div>
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
