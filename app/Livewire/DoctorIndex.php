<?php

namespace App\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class DoctorIndex extends Component
{
    public Collection $doctors;
    public bool $showForm;

    public function mount()
    {
        $this->doctors = Doctor::all();
        $this->showForm = false;
    }

    /**
     * Delete a doctor by id.
     *
     * @param int $doctorId
     * @return void
     */
    public function delete(int $doctorId)
    {
        $doctor = Auth::user()->doctors()->findOrFail($doctorId);
        $doctor->delete();

        $this->doctors = Doctor::all();
    }

    /**
     * Refresh the list of doctors.
     *
     * @return void
     */
    #[On('refresh-doctors')]
    public function refreshDoctors()
    {
        $this->doctors = Auth::user()->doctors;
    }

    /**
     * Display doctor form for editing or creating a new doctor.
     *
     * @return void
     */
    public function displayForm()
    {
        $this->showForm = true;
    }

    /**
     * Hide doctor form.
     *
     * @return void
     */
    #[On('hide-form')]
    public function hideForm()
    {
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.doctor-index');
    }
}
