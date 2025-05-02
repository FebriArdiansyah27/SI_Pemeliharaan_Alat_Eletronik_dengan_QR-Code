<div>
    <button wire:click="generateQrCode({{ $halamanPublicId }})" class="btn btn-primary">
        Generate QR
    </button>

    @if ($qrCode)
        <div class="mt-4">
            {!! $qrCode !!}
        </div>
    @endif
</div>
