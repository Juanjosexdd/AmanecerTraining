<div>

    @foreach ($cargos as $cargo)
        <article class="card " x-data="{open: false}">
            <div class="card-body bg-gray-100">
                <header class="flex justify-between items-center mb-2">
                    <h1 x-on:click="open = !open" class="cursor-pointer">
                        <i class="fas fa-sitemap mr-1 text-orange"></i> <strong>Cargo: </strong>{{$cargo->name}}
                    </h1>
                </header>
                <div x-show="open">
                    @livewire('area-move', ['cargo' => $cargo], key($cargo->id))
                </div>
            </div>
        </article>
        
    @endforeach



</div>
