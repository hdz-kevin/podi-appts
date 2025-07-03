<?php

namespace App\Livewire;

use Livewire\Component;

class PatientForm extends Component
{
    public string $name = '';

    public string $phone_number = '';

    public ?string $address = null;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
        ];
    }

    public function save()
    {
        return "Saving...";
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
