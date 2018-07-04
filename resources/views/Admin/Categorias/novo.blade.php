@extends('adminlte::page')
@section('style')
<style>
    .row{
        display:flex;
        justify-content: center;

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
        @if(isset($departamento))
            <h2>Editar Departamento <strong>{{$departamento->Nome}}</strong></h2>
        @else
        <h2>Cadastrar novo departamento</h2>
        @endif

    </div>
@stop
@section('content')
    <div class="container">
        <div class="row">
            @if(isset($departamento))
                <form class="col-md-6" action="{{route('update.departamento')}}" method="POST">
                <input type="hidden" name="departamento_id" value="{{$departamento->id}}">
            @else
            <form class="col-md-6" action="{{route('novo.departamento')}}" method="POST">
            @endif
                @include('Admin.layouts.errors')
                <div class="form-group">
                    @csrf
                    <label for="nomeDepartamento">Nome do Departamento</label>
                    <input type="text" name="nomeDepartamento" class="form-control" value="{{ $departamento->Nome or old('nomeDepartamento')  }}"id="nomeDepartamento">
                </div>
                <button type="submit" class="btn btn-primary btn-block">{{isset($departamento) ? 'Atualizar Departamento' : 'Salvar Departamento'}}</button>
            </form>
        </div>
    </div>
@stop
