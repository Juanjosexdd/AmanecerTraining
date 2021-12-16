<div>
    
    @foreach ($cargos as $item)
        <article class="card mb-6" >
            <div class="card-header bg-gray-100">
                    <p class="card-title"><strong>Cargo: </strong>{{$item->name}}</p>

                    <div class="card-tools">
                        <i class="fas fa-edit cursor-pointer text-blue" wire:click="edit({{$item}})"></i>
                        <i class="fas fa-eraser cursor-pointer text-red" wire:click="destroy({{$item}})"></i>
                    </div>
                </header>
            </div>
        </article>
    @endforeach
</div>
