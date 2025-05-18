<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Alat - {{ $alat->nama_alat }}</title>
    <link rel="icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon" />
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
            border: #000000 1px solid;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2b6cb0;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #edf2f7;
            color: #4a5568;
            font-weight: 600;
            width: 25%;
        }
        td {
            background-color: #ffffff;
            color: #2d3748;
        }
        tr:hover {
            background-color: #f7fafc;
        }
        .qr-code svg, .qr-code img {
            max-width: 120px;
            max-height: 120px;
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

    <table>
        <tr>
            <th>ID Alat</th>
            <td>{{ $alat->alat_id }}</td>
        </tr>
        <tr>
            <th>Nama Alat</th>
            <td>{{ $alat->nama_alat }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $alat->lokasi }}</td>
        </tr>
        <tr>
            <th>URL Halaman</th>
            <td>{{ url('/informasi-pemeliharaan-alat/' . $alat->alat_id) }}</td>
        </tr>
        <tr>
            <th>QR Code</th>
            <td>
                <div class="qr-code">
                    @if (!empty($alat->alat_id))
                        {!! $qrCode !!}
                    @else
                        <p class="text-gray-500">QR Code belum tersedia</p>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <!-- Tombol Download PDF (POST form) -->
    <div class="mt-6 no-print">
        <form method="POST" action="{{ route('cetak-alat.downloadPdf', ['alat_id' => $alat->alat_id]) }}">
            @csrf
            <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">
                Download PDF
            </button>
        </form>
    </div>

</div>

</body>
</html>
