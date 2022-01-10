<div>
    @foreach ($cargo->areas as $item)
        <article class="card mb-4" x-data="{open: false}">
            <div class="card-body ">
                @if ($area->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="area.name" class="form-input w-full border-gray-300 rounded-md mt-1 focus:border-blue-900" type="text" placeholder="Ingrese el nombre de la sección.">

                        @error('area.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección: </strong>{{$item->name}}</h1>

                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        {{-- @livewire('area-show', ['area' => $area], key($area->id)) --}}
                    </div>
                @endif
            </div>
        </article>
    @endforeach


    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva area
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva area</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full border-gray-300 rounded-md mt-1 focus:border-blue-900" type="text" placeholder="Escriba el nombre de la area">
                    @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false" type="submit">Cancelar</button>
                    <button class="btn btn-primary ml-2" type="submit " wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
