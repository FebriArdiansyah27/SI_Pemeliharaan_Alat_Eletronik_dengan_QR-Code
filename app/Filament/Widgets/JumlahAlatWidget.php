<?php

namespace App\Filament\Widgets;

use App\Models\Alat;
use Filament\Widgets\Widget;

class JumlahAlatWidget extends Widget
{
    protected static string $view = 'filament.widgets.jumlah-alat-widget';

    public int $jumlahAlat = 0;

    public function mount(): void
    {
        $this->jumlahAlat = Alat::count();
    }
}
