<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }

    public function vendasFuncLogado()
    {
        return count(auth()->user()->vendas);
    }

    public function ultimasVendas()
    {
        return $this->orderBy('id', 'desc')->take(4)->get();
    }
}
