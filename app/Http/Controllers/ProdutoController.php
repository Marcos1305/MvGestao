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
        $departamentos = $request->categoria_produto = explode(',', $request->categoria_produto);
        $novoProduto->departamentos()->sync($departamentos);
        if($novoProduto)
            return redirect()->back()->with('success', "Produto {$request->nomeProduto} inserido com sucesso!");
    }

    public function listaProdutos(Produto $produto, Departamento $departamento)
    {
        $produtos = $produto->all();
        $departamentos = $departamento->all();
        return view('admin.produtos.lista', compact('produtos', 'departamentos'));
    }

    public function editarProduto(Produto $produto, $id, Departamento $departamento)
    {
        $this->authorize('admin');
        $produto = $produto->find($id);
        $departamentos = $departamento->all();
        return view('admin.produtos.novo',compact('produto', 'departamentos'));
    }
    public function updateProduto(Produto $produto, StoreProdutoPost $request)
    {
        $this->authorize('admin');
        $produto = $produto->find($request->produto_id);
        $produto->nome = $request->nomeProduto;
        $produto->descricao = $request->descricaoProduto;
        $produto->preco = $request->precoProduto;
        $produto->CodBarra = $request->codigoProduto;

        $departamentos = $request->categoria_produto = explode(',', $request->categoria_produto);
        $produto->departamentos()->sync($departamentos);
        $save = $produto->save();
        if($save)
            return redirect()->back()->with('success', 'Produto atualizado com sucesso!');

        return redirect()->back()->with('error', 'Erro ao atualizar produto.');

    }

    public function excluirProduto(Produto $produto, $id)
    {
        $this->authorize('admin')->message('Ação não autorizada');
        $produtoDel = $produto->find($id);
        $delete = $produtoDel->delete();
        if($delete)
            return redirect()->back()->with('error', 'Sucesso ao excluir produto!');
    }
    public function produtoBusca(Request $request, Departamento $departamento)
    {
        $departamentos = $departamento->all();
        $departamento = $departamento->find($request->departamento);
        $produtos = $departamento->produtos;
        return view('admin.produtos.lista', compact('produtos', 'departamentos'));
    }

}
