<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function ultimosProdutos()
    {
        return $this->orderBy('id', 'desc')->take(4)->get();
    }
}
