<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nome'];
    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }
}
