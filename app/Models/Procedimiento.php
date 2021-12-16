<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    //Este metodo retorna la descripcion de la
    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
