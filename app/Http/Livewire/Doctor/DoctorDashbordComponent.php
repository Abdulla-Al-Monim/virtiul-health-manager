<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;

class DoctorDashbordComponent extends Component
{
    public function render()
    {
        return view('livewire.doctor.doctor-dashbord-component')->layout('layouts.base');
    }
}
