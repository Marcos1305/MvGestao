<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;


class DepartamentoController extends Controller
{
    public function novoDepartamento()
    {
        return view('admin.categorias.novo');
    }

    public function salvarDepartamento(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nomeDepartamento' => 'required|string|min:5|max:30'
        ]);
        $save = $departamento->insert([
            'Nome'  =>  $request->nomeDepartamento
        ]);

        if(!$save)
            return redirect()->back()->with('error', 'Erro ao inserir departamento');

        return redirect()->back()->with('success', "Departamento {$request->nomeDepartamento} inserido com sucesso!");


    }
}
