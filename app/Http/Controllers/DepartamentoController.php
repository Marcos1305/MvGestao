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

    public function listaDepartamento(Departamento $departamento)
    {
        $departamentos = $departamento->all();
        return view('admin.categorias.lista', compact('departamentos'));
    }

    public function editarDepartamento($id, Departamento $departamento)
    {
        $this->authorize('admin');
        $departamento = $departamento->find($id);
        return view('admin.categorias.novo', compact('departamento'));
    }

    public function updateDepartamento(request $request, Departamento $departamento)
    {
        $this->authorize('admin');
        $request->validate([
            'nomeDepartamento' => 'required|string|min:5|max:30'
        ]);
        $departamento = $departamento->find($request->departamento_id);
        $departamento->Nome = $request->nomeDepartamento;
        $save = $departamento->save();
        if($save)
            return redirect()->route('lista.departamento')->with('success', 'Departamento atualizado com sucesso!');
    }

    public function deleteDepartamento($id, Departamento $departamento)
    {
        $this->authorize('admin');
        $departamento = $departamento->find($id);
        $delete = $departamento->delete();

        if($delete)
            return redirect()->route('lista.departamento')->with('success', 'Departamento excluido com sucesso!');
    }

    public function departamentoVenda()
    {
        $dados = Departamento::with('produtos')->get();
        return response()->json($dados, 200);
    }
}
