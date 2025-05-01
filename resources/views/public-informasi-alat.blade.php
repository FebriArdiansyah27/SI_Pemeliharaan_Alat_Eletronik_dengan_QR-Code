<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Alat - {{ $alat->nama_alat }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-10">

    <h1 class="text-2xl font-bold mb-4 text-blue-600">Informasi Pemeliharaan Alat</h1>

    <div class="mb-6">
        <table class="table-auto w-full text-left border-collapse">
            <tr><th class="border px-4 py-2">ID Alat</th><td class="border px-4 py-2">{{ $alat->alat_id }}</td></tr>
            <tr><th class="border px-4 py-2">Nama Alat</th><td class="border px-4 py-2">{{ $alat->nama_alat }}</td></tr>
            <tr><th class="border px-4 py-2">Lokasi</th><td class="border px-4 py-2">{{ $alat->lokasi }}</td></tr>
            <tr><th class="border px-4 py-2">Kondisi</th><td class="border px-4 py-2">{{ $alat->kondisi }}</td></tr>
        </table>
    </div>

    <h2 class="text-xl font-semibold mb-2 text-green-600">Riwayat Pemeliharaan</h2>

    @if ($alat->pemeliharaans->isEmpty())
        <p class="text-gray-500">Belum ada data pemeliharaan untuk alat ini.</p>
    @else
        <table class="table-auto w-full border-collapse mt-2">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Uraian</th>
                    <th class="border px-4 py-2">Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alat->pemeliharaans as $pemeliharaan)
                    <tr>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($pemeliharaan->tanggal)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $pemeliharaan->uraian_pemeliharaan }}</td>
                        <td class="border px-4 py-2">{{ $pemeliharaan->kondisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ url('/') }}" class="mt-6 inline-block text-blue-500 underline">Kembali ke Beranda</a>

</div>

</body>
</html>
