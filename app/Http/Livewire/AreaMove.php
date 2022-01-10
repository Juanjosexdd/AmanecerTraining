<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Cargo;
use Livewire\Component;

class AreaMove extends Component
{
    public $name, $cargo, $area, $description;

    public function mount(Cargo $cargo)
    {
        $this->cargo = $cargo;
        $this->area = new Area();

    }

    protected $rules = [
        'area.name' => 'required',
        'area.description' => 'required',
    ];

    private function resetInput()
    {		
		$this->name = null;
    }
    public function render()
    {
        return view('livewire.area-move');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',

        ]);

        Area::create([
            'cargo_id' => $this->cargo->id,
            'name' => $this->name,
        ]);
        $this->resetInput();
        $this->emit('render');
    }


    public function edit(Area $area)
    {
        $this->area = $area;
    }

    public function update(Area $area)
    {
        $this->validate();

        $this->area->save();
        $this->area = new area();

        $this->resetInput();
        $this->emit('render');
    }
}

