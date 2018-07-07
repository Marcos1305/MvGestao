<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'preco', 'CodBarra', 'estoque'];
    public function ultimosProdutos()
    {
        return $this->orderBy('id', 'desc')->take(4)->get();
    }
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
