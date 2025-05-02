<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-filament::widget class="col-span-1">
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-700">Jumlah Alat</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ \App\Models\Alat::count() }}</p>
            </div>
        </x-filament::widget>
        <x-filament::widget class="col-span-1">
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-700">Jumlah Pemeliharaan Alat</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ \App\Models\Pemeliharaan::count() }}</p>
            </div>
        </x-filament::widget>
    </div>
</x-filament::page>
