<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;

class PatientDashbordComponent extends Component
{
    public function render()
    {
        return view('livewire.patient.patient-dashbord-component')->layout('layouts.base');
    }
}
