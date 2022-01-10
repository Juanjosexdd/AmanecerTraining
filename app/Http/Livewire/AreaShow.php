<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Cargo;
use Livewire\Component;

class AreaShow extends Component
{

    public $name, $cargo, $area, $description;

    public function mount(Area $area)
    {
        $this->area = new Area;
    }

    protected $rules = [
        'area.name' => 'required',
        'area.description' => 'required',
    ];

    public function render()
    {
        $cargos = Cargo::all();
            
        return view('livewire.area-show', compact('cargos'));
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',

        ]);

        Area::create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->cargo = Cargo::find($this->cargo->id);
    }

    public function edit(area $area)
    {
        $this->area = $area;
    }

    public function update()
    {
        $this->validate();

        $this->area->update();
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy(area $area)
    {
        $area->delete();
        $this->cargo= Cargo::find($this->cargo->id);
    }
}
