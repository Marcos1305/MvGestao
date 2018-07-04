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

Route::get('/login', 'HomeController@login')->name('login');
Route::post('login', 'HomeController@postLogin')->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    route::get('/', 'AdminController@index')->name('admin.index');
    route::get('/profile', 'FuncionarioController@profile')->name('func.profile');
    Route::get('/nova-senha', 'FuncionarioController@novaSenha')->name('func.senha');
    Route::post('/salvar-senha', 'FuncionarioController@salvarsenha')->name('func.salvarsenha');

    Route::get('/novo-produto', 'ProdutoController@novoProduto')->name('novo.produto');
    Route::post('/novo-produto', 'ProdutoController@salvarProduto')->name('novo.produto');
    Route::get('/lista-produtos', 'ProdutoController@listaProdutos')->name('lista.produtos');
    Route::get('/produto/{id}/editar', 'ProdutoController@editarProduto')->name('editar.produtos');
    Route::get('/produto/{id}/excluir', 'ProdutoController@excluirProduto')->name('excluir.produtos');
    Route::post('/produto/update', 'ProdutoController@updateProduto')->name('update.produtos');

    Route::get('/novo-departamento', 'DepartamentoController@novoDepartamento')->name('novo.departamento');
    Route::post('/novo-departamento', 'DepartamentoController@salvarDepartamento')->name('novo.departamento');

});

