<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function procedimientos()
    {
        return $this->hasMany(Procedimiento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    
}
