<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;
use App\Models\User;

class AdminDashboard extends Component
{
    public $nroUsuarios = 0;

    public function render()
    {
        $this->nroUsuarios = User::all()->count();

        return view('livewire.dashboards.admin-dashboard')
        ->layout('layouts.app');
    }
}
