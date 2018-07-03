@extends('adminlte::page')
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
        <h2>Cadastrar novo departamento</h2>

    </div>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <form class="col-md-6" action="{{route('novo.departamento')}}" method="POST">
                @include('Admin.layouts.errors')
                <div class="form-group">
                    @csrf
                    <label for="nomeDepartamento">Nome do Departamento</label>
                    <input type="text" name="nomeDepartamento" class="form-control" id="nomeDepartamento">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Salvar</button>
            </form>
        </div>
    </div>
@stop
