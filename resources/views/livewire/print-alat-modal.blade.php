<div>
    @if ($alat)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-3xl w-full overflow-auto max-h-[80vh]">
                <h2 class="text-xl font-semibold mb-4">Informasi Alat - {{ $alat->nama_alat }}</h2>
                <div>
                    <table class="w-full border-collapse border border-gray-300">
                        <tr><th class="border border-gray-300 p-2 text-left">ID Alat</th><td class="border border-gray-300 p-2">{{ $alat->alat_id }}</td></tr>
                        <tr><th class="border border-gray-300 p-2 text-left">Nama Alat</th><td class="border border-gray-300 p-2">{{ $alat->nama_alat }}</td></tr>
                        <tr><th class="border border-gray-300 p-2 text-left">Lokasi</th><td class="border border-gray-300 p-2">{{ $alat->lokasi }}</td></tr>
                        <tr><th class="border border-gray-300 p-2 text-left">Kondisi</th><td class="border border-gray-300 p-2">{{ $alat->kondisi }}</td></tr>
                        <tr><th class="border border-gray-300 p-2 text-left">Deskripsi</th><td class="border border-gray-300 p-2">{{ $alat->deskripsi }}</td></tr>
                    </table>
                </div>
                <div class="mt-4 flex justify-end gap-2">
                    <button wire:click="closeModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Tutup</button>
                    <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Cetak</button>
                </div>
            </div>
        </div>
    @endif
</div>
