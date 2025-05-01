<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Pemeliharaan Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Detail Alat</h1>

        <table class="table-auto w-full border mb-6">
            <tbody>
                <tr><th class="border px-4 py-2 text-left">Nama Alat</th><td class="border px-4 py-2">{{ $alat->nama }}</td></tr>
                <tr><th class="border px-4 py-2 text-left">Kode Alat</th><td class="border px-4 py-2">{{ $alat->kode_alat }}</td></tr>
                <tr><th class="border px-4 py-2 text-left">Lokasi</th><td class="border px-4 py-2">{{ $alat->lokasi }}</td></tr>
                <tr><th class="border px-4 py-2 text-left">Spesifikasi</th><td class="border px-4 py-2">{{ $alat->spesifikasi }}</td></tr>
                {{-- Tambahkan kolom detail alat lainnya jika ada --}}
            </tbody>
        </table>

        <h2 class="text-xl font-semibold mb-3">Riwayat Pemeliharaan</h2>

        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alat->pemeliharaans as $pemeliharaan)
                    <tr>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($pemeliharaan->tanggal)->format('d M Y') }}</td>
                        <td class="border px-4 py-2">{{ $pemeliharaan->deskripsi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="border px-4 py-2 text-center text-gray-500">Belum ada riwayat pemeliharaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6 text-sm text-gray-500 text-center">
            Halaman ini dapat diakses tanpa login.
        </div>
    </div>

</body>
</html>
