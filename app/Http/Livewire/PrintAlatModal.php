<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alat;

class PrintAlatModal extends Component
{
    public ?Alat $alat = null;
    public bool $showModal = false;



    public function openModal($alatId)
    {
        $this->alat = Alat::find($alatId);
        $this->showModal = true;
        $this->dispatchBrowserEvent('print-modal-opened');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->alat = null;
    }

    public function render()
    {
        return view('livewire.print-alat-modal');
    }
}
