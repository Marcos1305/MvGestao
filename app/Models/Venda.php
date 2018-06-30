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
        return $this->hasMany(Produto::class);
    }
}
