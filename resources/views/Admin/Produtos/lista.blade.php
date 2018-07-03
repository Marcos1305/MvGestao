@extends('adminlte::page')
@section('style')
    <style>
        .row{
            display: flex;
            justify-content: center;
        }
        table, thead, tbody, td{
            border: 0.1rem solid #222D32 !important;
        }

        table > thead{
            text-align: center;
        }
        td + td {
            text-align: center;
        }
        .tag-product{
            margin: 0 0.3rem;
        }

        @media screen and (max-width: 767px){
            .tabela {
            max-width: 100%;
            overflow: scroll
            }
        }
    </style>
@stop
@section('content_header')
    <div class="container">
        <div class="row text-center">
            <h2>Lista de Produtos</h2>
        </div>
    </div>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 tabela">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <td>ID</td>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Preço</td>
                        <td>Departamentos</td>
                        @can('admin')
                            <td>Ações</td>
                        @endcan
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->CodBarra}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>R$ {{$produto->preco}}</td>
                                <td>
                                    @can('admin')
                                        @foreach ($produto->departamentos as $departamento)
                                            <span class="label label-primary pull-right tag-product">{{$departamento->Nome}}</span>
                                        @endforeach
                                    @endcan
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm">Editar Produto</a>
                                    <a class="btn btn-danger btn-sm">Excluir Produto</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop