<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use Livewire\Component;

class Cargos extends Component
{
    public function render()
    {
        $cargos = Cargo::all();
        return view('livewire.cargos',compact('cargos'));
    }
}
