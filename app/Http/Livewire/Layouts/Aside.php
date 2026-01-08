<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use App\Models\User;

class Aside extends Component
{
    public $totalUsuarios = 0;

    public function render()
    {
        $this->totalUsuarios = User::all()->count();
        return view('livewire.layouts.aside');
    }
}
