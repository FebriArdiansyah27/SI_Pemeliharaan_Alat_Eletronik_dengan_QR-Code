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
    </style>
</head>
<body>

<div class="container">
    <h1>Informasi Pemeliharaan Alat</h1>

    <div>
        <table>
            <tr><th>ID Alat</th><td>{{ $alat->alat_id }}</td></tr>
            <tr><th>Nama Alat</th><td>{{ $alat->nama_alat }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $alat->lokasi }}</td></tr>
            <tr><th>Kondisi</th><td>{{ $alat->kondisi }}</td></tr>
            <!-- Menampilkan QR Code secara dinamis -->
            <tr><th>QR Code</th>
                <td class="qr-code">
                    @if (!empty($alat->alat_id))
                    {!! QrCode::size(120)->generate(url('/informasi-pemeliharaan-alat/' . $alat->alat_id)) !!}
                    @else
                        <p class="text-gray-500">QR Code belum tersedia</p>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <h2>Riwayat Pemeliharaan</h2>

    @if ($alat->pemeliharaans->isEmpty())
        <p class="empty-message">Belum ada data pemeliharaan untuk alat ini.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alat->pemeliharaans as $pemeliharaan)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($pemeliharaan->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $pemeliharaan->uraian_pemeliharaan }}</td>
                        <td>{{ $pemeliharaan->kondisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>
