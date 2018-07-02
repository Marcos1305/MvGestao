<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function novoProduto()
    {
        return view('admin.produtos.novo');
    }
    public function salvarProduto(request $request)
    {
        dd($request->all());
    }

}
