@extends('adminlte::page')
@section('style')
    <style>
        .search{
            justify-content: center;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .no-gutters{
            padding: 0 !important;
        }
        table, thead, tbody, td{
            border: 0.1rem solid #222D32 !important;
        }
        thead, tfoot{
            background-color: rgba(34, 45, 50, .2);
            color: black;
        }
        tbody > tr > td {
            text-align: center;
        }
        @media screen and (max-width: 767px){
            .tabela {
            max-width: 100% !important;
            overflow: scroll !important
            }
        }
    </style>
@stop
@section('content_header')
    <div class="container">
        <h2 class="text-center">Nova Venda</h2>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="">
            <h4>Adicionar produtos a venda</h4>
            @include('admin.layouts.errors')
            <div class="row search">
                <div class="col-xs-12  no-gutters">
                    <div class="col-xs-12 col-md-5">
                        <select name="" id="" class="form-control"data-js="departamentos">
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <select name="" id="" class="form-control" data-js="produtos">
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <button type="submit" data-js="button-form" class="btn btn-primary btn-block">Adicionar</button>
                    </div>
                </div>
            </div>
        </form>
            <table class="table table-striped tabela table-bordered table-hover">
                <thead>
                    <td>#</td>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Preço</td>
                    <td>Remover</td>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <td>#</td>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Preço</td>
                    <td data-js="total">Total: </td>
                </tfoot>
            </table>
        <form method="POST" action="{{route('post.venda')}}">
            @csrf
            <input type="hidden" name="produtos_id" data-js="input_post">
            <button class="btn btn-primary" data-js="btn-post-ids">Confirmar venda</button>
        </form>
    </div>
@stop
@section('extraJS')


<script src="{{asset('js/venda.js')}}"></script>
@stop
