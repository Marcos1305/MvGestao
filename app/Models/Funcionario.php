<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Funcionario extends Authenticatable
{
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
