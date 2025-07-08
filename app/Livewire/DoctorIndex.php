<?php

namespace App\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DoctorIndex extends Component
{
    public Collection $doctors;

    public function mount()
    {
        $this->doctors = Doctor::all();
    }

    public function delete($doctorId)
    {
        $doctor = Auth::user()->doctors()->findOrFail($doctorId);
        $doctor->delete();

        $this->doctors = Doctor::all();
    }
    
    public function render()
    {
        return view('livewire.doctor-index');
    }
}
