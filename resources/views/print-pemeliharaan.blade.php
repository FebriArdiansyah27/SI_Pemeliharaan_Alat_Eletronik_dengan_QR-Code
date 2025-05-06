<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cetak Data Pemeliharaan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Data Pemeliharaan Alat</h1>
    <table>
        <tr>
            <th>ID Pemeliharaan</th>
            <td>{{ $pemeliharaan->id }}</td>
        </tr>
        <tr>
            <th>ID Alat</th>
            <td>{{ $pemeliharaan->alat->alat_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Tanggal Pemeliharaan</th>
            <td>{{ $pemeliharaan->tanggal }}</td>
        </tr>
        <tr>
            <th>Uraian Pemeliharaan</th>
            <td>{{ $pemeliharaan->uraian_pemeliharaan }}</td>
        </tr>
        <tr>
            <th>Kondisi Setelah Pemeliharaan</th>
            <td>{{ $pemeliharaan->kondisi }}</td>
        </tr>
    </table>
</body>
</html>
