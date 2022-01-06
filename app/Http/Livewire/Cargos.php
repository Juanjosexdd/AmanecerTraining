<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cargo;

class Cargos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $search, $name;
    public $updateMode = false;

    public function render()
    {
        $cargos = Cargo::where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(5);
            
        return view('livewire.cargos.view', compact('cargos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->name = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Cargo::create([ 
			'name' => $this-> name
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Cargo creado con exito.');
    }

    public function edit($id)
    {
        $record = Cargo::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cargo::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Cargo actualizado con exito!.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Cargo::where('id', $id);
            $record->delete();
        }
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
