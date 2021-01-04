<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashbordComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashbord-component')->layout('layouts.base');
    }
}
