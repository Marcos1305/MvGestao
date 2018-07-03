<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProdutoPost;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function novoProduto(Departamento $departamento)
    {
        $departamentos = $departamento->all();
        return view('admin.produtos.novo', compact('departamentos'));
    }
    public function salvarProduto(StoreProdutoPost $request, Produto $produto)
    {
        $novoProduto = $produto->create([
            'nome'      => $request->nomeProduto,
            'descricao' => $request->descricaoProduto,
            'preco'     =>  $request->precoProduto,
            'CodBarra'  => $request->codigoProduto,
        ]);
        $request->categoria_produto = explode(',', $request->categoria_produto);
        foreach($request->categoria_produto as $departamento){
            $novoProduto->departamentos()->attach($departamento);
        }
        if($novoProduto)
            return redirect()->back()->with('success', "Produto {$request->nomeProduto} inserido com sucesso!");
    }

    public function listaProdutos(Produto $produto)
    {
        $produtos = $produto->all();
        return view('admin.produtos.lista', compact('produtos'));
    }

}
