@extends('adminlte::page')
@section('title', 'Novo Produto')
@section('style')
<style>
    .row{
        display:flex;
        justify-content: center;
        justify-items: center;
    }
    .form-group{
        padding: 10px 0;
    }
    .box-tags{
        background-color: #FFFFFF;
        border: 1px solid #D2D6DE;
        min-height:4em;
        padding: 1rem 0;
        margin-bottom: 2rem;
    }
    .btn-tag{
        margin: 0 0.5em;
    }
</style>
@stop
@section('content_header')
    <div class="container text-center">
        <h2>Adicionar Produto</h2>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('Admin.layouts.errors')
            </div>
        </div>
        <div class="row">
            <form action="{{route('novo.produto')}}" method="POST" id="form" class="col-md-6">
                @csrf
                <div class="form-group ">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" name="nomeProduto" id="" value="{{old('nomeProduto')}} "class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="codigoProduto">Código</label>
                        <div class="form-group">
                            <input type="number" name="codigoProduto" id="" value="{{old('codigoProduto')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precoProduto">Preço</label>
                            <input type="text" name="precoProduto" value="{{old('precoProduto')}} " class="form-control" id="precoProduto">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricaoProduto">Descrição</label>
                    <textarea  class="form-control" id="descricaoProduto" name="descricaoProduto">{{old('descricaoProduto')}}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-xs-8">
                        <select class="form-control" data-js="select-input"id="">
                            @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->id}}">{{$departamento->Nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <a data-js="btn-categoria" class="btn  btn-primary">Adicionar departamento</a>
                    </div>
                </div>
                <input type="hidden" data-js="categoria_produto" name="categoria_produto">
                <div class="form-group">
                    <label for="">Categorias adicionadas</label>
                    <div class="col-xs-12 box-tags" data-js="categoria-box">
                    </div>
                </div>
                <button type="submit" data-js="form-submit" class="btn btn-primary btn-lg btn-block ">Adicionar Produto</button>
            </form>
        </div>
    </div>

@stop
@section('extraJS')
<script src="{{asset('js/novoProduto.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#precoProduto").maskMoney({
         prefix: "R$ ",
         decimal: ",",
         thousands: "."
     });
    });
    $('#form').submit(function(){
        $('#precoProduto').maskMoney('destroy');
        $('#precoProduto').maskMoney({thousands:'', decimal:'.'});
        $('#precoProduto').maskMoney('mask');
    });

</script>
@stop
