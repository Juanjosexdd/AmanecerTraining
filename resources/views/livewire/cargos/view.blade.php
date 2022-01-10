@section('title', __('Cargos'))
<div class="container-fluid">
	<div class="cargo justify-content-center">
		<div class="col-md-12">
			<div class="">
				<div class="">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						
						@if (session()->has('message'))
						<div wire:poll.4s class="p-2">
							<div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
							  <span class="inline-flex bg-orange font-bold text-white rounded-full h-6 px-3 justify-center items-center text-white-800">Importante!</span>
							  <span class="inline-flex px-2 text-orange"> {{ session('message') }} </span>
							</div>
						  </div>
						@endif
						<div>
							<input wire:keydown='limpiar_page' wire:model='search' type="text" class="ml-4 form-control" name="search" id="search" placeholder="Buscar cargo">
						</div>
						<div class="btn btn-sm  bg-orange " data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus text-white"></i>  
						</div>
					</div>
				</div>
				
				<div class="card-body drop-shadow-2xl">
						@include('livewire.cargos.create')
						@include('livewire.cargos.update')
						<div class="flex flex-col">
							<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
								<div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
									<div class="overflow-hidden shadow-md sm:rounded-lg">
										@if ($cargos->count())
										<table class="min-w-full">
											<thead class="bg-gray-100 dark:bg-gray-700">
												<tr>
													<th colspan="1" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
														#
													</th>
													<th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
														Cargo
													</th>
													<th colspan="2" class="relative py-3 px-6">
														<span class="sr-only">Acciónes</span>
													</th>
												</tr>
											</thead>
											<tbody>
												@foreach($cargos as $cargo)
												
													<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
														<td width="5px" class="py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
															{{ $loop->iteration }}
														</td>
														<td  class="py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
															{{ $cargo->name }}
														</td>
														<td width="8px" class=" text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-end btn-group">
															<a data-toggle="modal" data-target="#updateModal" class=" text-gray-500  cursor-pointer py-3 px-1" wire:click="edit({{$cargo->id}})"><i class="fa fa-edit"></i> </a>
																						 
															<a class="text-gray-500 cursor-pointer hover:text-red-500  py-3 px-1" onclick="confirm('Desea Eliminar el cargo {{$cargo->name}}? \nAl borrarlo no podrá recuperarlo!')||event.stopImmediatePropagation()" wire:click="destroy({{$cargo->id}})"><i class="fa fa-trash"></i> </a> 
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
										<span class=" float-right my-2 mx-2">{{ $cargos->links() }}</span>
										@else
											<div class="px-6 py-4">
												No hay ningun registro que coincida con la busqueda...
											</div>
										@endif
							
									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>

</div>