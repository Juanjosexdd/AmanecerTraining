@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-orange elevation-4 card-outline">
            <div class="card-header">
                <h3 class="card-title flex-">
                    <i class="icon fas fa-mug-hot text-xl text-orange"> Lista de cargos</i>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @livewire('cargos')
            </div>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>

      .cursor-pointer {
        cursor: pointer;
      }
    </style>
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
