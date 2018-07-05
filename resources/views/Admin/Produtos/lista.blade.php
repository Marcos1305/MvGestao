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
        .search{
            justify-content: flex-start;
            margin-bottom: 0.5rem;
        }
        .no-gutters{
            padding: 0 !important;
        }
        thead{
            background-color: rgba(34, 45, 50, .2);
            color: black;
        }
        @media screen and (max-width: 767px){
            .btn{
            margin-top: 0.3rem;
            }
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
        <div class="row text-center">
             @include('Admin.layouts.errors')
        </div>
    </div>
@stop
@section('content')
    <div class="container">
        <form action="{{route('busca.produtos')}}" method="post">
            @csrf
            <h4>Listar por departamento</h4>
            <div class="row search ">
                <div class="col-xs-12 col-md-5 no-gutters">
                    <div class="col-xs-7">
                        <select class="form-control"name="departamento" id="">
                            @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->id}}">{{$departamento->Nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-5 no-gutters">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-12 tabela">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
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
                                <td>{{$produto->CodBarra}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>R$ {{$produto->preco}}</td>
                                <td>
                                    @foreach ($produto->departamentos as $departamento)
                                        <span class="label label-primary pull-right tag-product">{{$departamento->Nome}}</span>
                                    @endforeach
                                </td>
                                @can('admin')
                                    <td>
                                        <a href="{{route('editar.produtos', $produto->id)}}"class="btn btn-warning btn-sm">Editar Produto</a>
                                        <a href="{{route('excluir.produtos', $produto->id)}}" onClick="return confirm('Tem certeza que desejar excluir esse produto?')" class="btn btn-danger btn-sm">Excluir Produto</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
