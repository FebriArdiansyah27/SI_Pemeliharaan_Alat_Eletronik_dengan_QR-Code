<?php

namespace App\Filament\Widgets;

use App\Models\Pemeliharaan;
use Filament\Widgets\Widget;

class JumlahPemeliharaanWidget extends Widget
{
    protected static string $view = 'filament.widgets.jumlah-pemeliharaan-widget';

    public int $jumlahPemeliharaan = 0;

    public function mount(): void
    {
        $this->jumlahPemeliharaan = Pemeliharaan::count();
    }
}
