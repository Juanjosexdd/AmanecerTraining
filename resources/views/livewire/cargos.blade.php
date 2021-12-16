<div>

    @foreach ($cargos as $cargo)
    <article class="card mb-6" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header class="flex justify-between items-center">
                <h1  class="cursor-pointer"><strong>Cargo: </strong>{{$cargo->name}}</h1>
                <div>
                    <i class="fas fa-edit cursor-pointer text-blue-500" x-on:click="open = !open"></i>
                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$cargo}})"></i>
                </div>
            </header>
            <div x-show="open">
                <form wire:submit.prevent="update">
                    <input wire:model="name" class="form-control w-full border-gray-300 rounded-md mt-1 focus:border-blue-900" type="text" placeholder="Ingrese el nombre de la cargo.">

                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex justify-end">
                        <button class="btn btn-danger" x-on:click="open = false" type="submit">Cancelar</button>
                        <button class="btn btn-primary ml-2" type="submit " wire:click="update">Agregar</button>
                    </div>
                </form>
                
            </div>
            
                
        </div>
    </article>
    @endforeach


    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva cargo
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva cargo</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-control w-full border-gray-300 rounded-md mt-1 focus:border-blue-900" type="text" placeholder="Escriba el nombre de la sección">
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
