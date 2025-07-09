<?php

namespace App\Livewire;

use Livewire\Component;

class DoctorForm extends Component
{
    public function render()
    {
        return view('livewire.doctor-form');
    }

    public function hideForm()
    {
        $this->dispatch('hideForm');
    }
}
