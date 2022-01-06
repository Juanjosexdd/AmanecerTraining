<?php

use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.index');


Route::resource('cargos', CargoController::class )->names('cargos');
