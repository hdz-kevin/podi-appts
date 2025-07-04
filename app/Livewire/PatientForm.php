<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PatientForm extends Component
{
    #[Validate('required', message: 'El nombre es obligatorio')]
    public string $name = '';

    #[Validate('required', message: 'El número de teléfono es obligatorio')]
    #[Validate('numeric', message: 'El número de teléfono es invalido')]
    #[Validate('digits:10', message: 'El número de teléfono debe tener 10 dígitos')]
    public string $phone_number = '';

    #[Validate('nullable')]
    public ?string $address = null;

    public function save()
    {
        $data = $this->validate();
        if ($data['address'] === '') $data['address'] = null;

        Auth::user()->patients()->create($data);

        $this->hideForm();
    }

    public function hideForm()
    {
        $this->dispatch('hideForm');
    }

    public function render()
    {
        return view('livewire.patient-form');
    }
}
