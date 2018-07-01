<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(venda $vendas, Produto $produtos)
    {
        //Ultimos Produtos Adicionados
        $ultimosProdutos = $produtos->ultimosProdutos();

        //Vendas  do funcionario logado
        $vendasFuncLogado = $vendas->vendasFuncLogado();

        //Ultimas vendas Geral
        $ultimasVendas = $vendas->ultimasVendas();

        $total = 0;

        return view('Admin.home', compact('vendasFuncLogado', 'ultimosProdutos', 'ultimasVendas', 'produtosUltimasVendas', 'total'));
    }
}
