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
    public ?int $editingDoctorId = null;

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

        $this->refreshDoctors();
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
     * @param integer|null $editingDoctorId
     * @return void
     */
    public function displayForm(?int $editingDoctorId = null)
    {
        if ($editingDoctorId !== null) {
            $this->editingDoctorId = $editingDoctorId;
        }

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
        if ($this->editingDoctorId !== null) {
            $this->editingDoctorId = null;
        }

        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.doctor-index');
    }
}
