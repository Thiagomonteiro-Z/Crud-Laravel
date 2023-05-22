<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $table= 'produtos';
    protected $primaryKey = 'id';
    protected $fillable = [ // letra_numero	nome	tipo	preco_compra	preco_venda	estoque
        'letra_numero',
        'nome',
        'tipos_id',
        'preco_compra',
        'preco_venda',
        'estoque',
    ];

    public function getTipo(){
        return $this->hasOne(Tipos::class,'id','tipos_id');    
    }
}

