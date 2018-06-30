<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Funcionario $funcionario, Produto $produtos)
    {
        //Ultimos Produtos Adicionados
        $produtos = Produto::orderBy('id', 'desc')->take(4)->get();

        //total de vendas do funcionario logado
        $vendas = count(auth()->user()->vendas);

        //Ultimas vendas Geral
        $ultimasVendas = Venda::orderBy('id', 'desc')->take(4)->get();

        return view('Admin.home', compact('vendas', 'produtos', 'ultimasVendas'));
    }
}
