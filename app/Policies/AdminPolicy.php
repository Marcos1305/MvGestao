<?php

namespace App\Policies;

use App\Models\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function admin(Funcionario $funcionario)
    {
        return $user->cargo = 'asd' || 'Gerendaste';
    }
}
