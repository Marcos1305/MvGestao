<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{

    public function novaVenda()
    {
        return view('Admin.vendas.nova');
    }

    public function salvarVenda(request $request, Venda $venda)
    {
        $request->validate([
            'produtos_id' => 'required|min:1'
        ]);
        $produtos = explode(',', $request->produtos_id);
        $venda->funcionario_id = auth()->user()->id;
        $save = $venda->save();
        foreach($produtos as $produto){
            $venda->produtos()->attach($produto);
        }
        if($save)
            return redirect()->back()->with('success', 'Sucesso ao salvar venda!');
    }

    public function listaVenda(Venda $venda)
    {
        $ultimasVendas = $venda->paginate(10);
        return view('Admin.vendas.lista', compact('ultimasVendas'));
    }

    public function vendaFuncionario(Venda $venda){
        $ultimasVendas = auth()->user()->vendas()->paginate(10);
        $nome = auth()->user()->name;
        return view('Admin.vendas.lista', compact('ultimasVendas', 'nome'));
    }
}
