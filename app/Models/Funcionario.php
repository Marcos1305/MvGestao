<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Funcionario extends Authenticatable
{
    protected $fillable = ['name', 'cpf', 'email', 'cargo', 'DataDeNascimento', 'DataDeContratacao', 'Supervisor', 'password'];
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
