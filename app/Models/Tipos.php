<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiponome',
    ];


  
    public function produtos()
    {
        return $this->hasMany(Produtos::class, 'tipos_id', 'id');
    }
}
