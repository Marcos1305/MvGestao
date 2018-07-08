<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Http\Request;
use App\Models\Produto;
class VendaController extends Controller
{

    public function novaVenda()
    {
        return view('Admin.Vendas.nova');
    }

    public function salvarVenda(request $request, Venda $venda)
    {
        $request->validate([
            'produtos_id' => 'required|min:1'
        ]);
        $produtos = explode(',', $request->produtos_id);
        foreach($produtos as $produto){
            $produtoVenda = Produto::find($produto);
            if($produtoVenda->estoque === 0){
                return redirect()->back()->with('error', "Produto {$produtoVenda->nome} com estoque insuficiente.");
            }
            $produtoVenda->estoque -= 1;
            $produtoVenda->save();

        }
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
        return view('Admin.Vendas.lista', compact('ultimasVendas'));
    }

    public function vendaFuncionario(Venda $venda){
        $ultimasVendas = auth()->user()->vendas()->paginate(10);
        $nome = auth()->user()->name;
        return view('Admin.Vendas.lista', compact('ultimasVendas', 'nome'));
    }
}
