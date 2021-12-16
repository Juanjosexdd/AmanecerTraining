<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    //relacion uno a uno inverso
    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class);
    }
}
