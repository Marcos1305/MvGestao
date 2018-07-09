<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function(){
    return redirect()->route('admin.index');
})->name('index');

Route::get('/register', function(){
    return redirect()->route('login')->with('error', 'Função de cadastro desativado.');
});

Route::get('/login', 'HomeController@login')->name('login');
Route::post('login', 'HomeController@postLogin')->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/logout', 'LoginController@logout');
    route::get('/profile', 'FuncionarioController@profile')->name('func.profile');
    Route::get('/nova-senha', 'FuncionarioController@novaSenha')->name('func.senha');
    Route::post('/salvar-senha', 'FuncionarioController@salvarsenha')->name('func.salvarsenha');

    //Produtos
    Route::get('/novo-produto', 'ProdutoController@novoProduto')->name('novo.produto');
    Route::post('/novo-produto', 'ProdutoController@salvarProduto')->name('novo.produto');
    Route::get('/lista-produtos', 'ProdutoController@listaProdutos')->name('lista.produtos');
    Route::get('/produto/{id}/editar', 'ProdutoController@editarProduto')->name('editar.produtos');
    Route::get('/produto/{id}/excluir', 'ProdutoController@excluirProduto')->name('excluir.produtos');
    Route::post('/produto/update', 'ProdutoController@updateProduto')->name('update.produtos');
    Route::any('/produto/busca/', 'ProdutoController@produtoBusca')->name('busca.produtos');

    //Departamentos
    Route::get('/novo-departamento', 'DepartamentoController@novoDepartamento')->name('novo.departamento');
    Route::post('/novo-departamento', 'DepartamentoController@salvarDepartamento')->name('novo.departamento');
    Route::get('/lista-departamentos', 'DepartamentoController@listaDepartamento')->name('lista.departamento');
    Route::get('/editar-departamento/{id}', 'DepartamentoController@editarDepartamento')->name('editar.departamento');
    Route::post('/update-departamento', 'DepartamentoController@updateDepartamento')->name('update.departamento');
    Route::get('/delet-departamento/{id}', 'DepartamentoController@deleteDepartamento')->name('delete.departamento');

    //Vendas
    Route::get('/nova-venda', 'VendaController@novaVenda')->name('nova.venda');
    Route::post('/nova-venda', 'VendaController@salvarVenda')->name('post.venda');
    Route::get('/lista-vendas', 'VendaController@listaVenda')->name('lista.venda');
    Route::get('/vendas-funcionario', 'VendaController@vendaFuncionario')->name('funcionario.venda');

    //Funcionario
    Route::get('/novo-funcionario', 'FuncionarioController@novoFuncionario')->name('novo.funcionario');
    Route::post('/novo-funcionario', 'FuncionarioController@salvarFuncionario')->name('novo.funcionario');
    Route::get('/lista-funcionarios', 'FuncionarioController@listaFuncionario')->name('lista.funcionario');

});

Route::get('/departamento-produtos', 'DepartamentoController@departamentoVenda');
