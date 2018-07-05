<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    protected $venda;
    public function __construct(venda $venda)
    {
        $this->venda = $venda;
    }

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

    public function listaVenda()
    {
        return view('Admin.vendas.lista');
    }
}
