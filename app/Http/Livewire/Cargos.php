<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use Livewire\Component;

class Cargos extends Component
{
    public $cargo,$name, $description;

    protected $rules = [
        'name' => 'required|min:6'
    ];

    public function render()
    {
        $cargos = Cargo::all();
        return view('livewire.cargos',compact('cargos'));
    }

    public function store()
    {
        $this->validate();

        Cargo::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset('name','description');
    }

    public function update()
    {
        $this->validate();

        $this->cargo->update();
        $this->resetInput();
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        $this->reset('name');

    }
}
