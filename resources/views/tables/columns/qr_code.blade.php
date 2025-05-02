@php
    $value = $getState();

    if ($value instanceof Closure) {
        $value = $value();
    }

    // Pastikan nilainya string
    if (!is_string($value)) {
        $value = '';
    }
@endphp

@if (!empty($value))
    {!! QrCode::size(100)->generate($value) !!}
@else
    <span class="text-gray-500 italic">Tidak ada data</span>
@endif
