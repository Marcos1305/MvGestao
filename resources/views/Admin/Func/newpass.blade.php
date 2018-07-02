@extends('adminlte::page')
<style>
    .row{
        display:flex;
        justify-content: center;

    }
</style>
@section('content_header')
    <div class="container text-center">
        <h2>Nova senha</h2>
        <div class="row">
            <div class="col-md-4">
                @include('Admin.layouts.errors')
            </div>
        </div>
    </div>

@stop
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('func.salvarsenha')}}" class="col-md-4" method="post">
                @csrf
                <div class="form-group">
                    <label for="atual">Senha Atual</label>
                    <input type="password" name="atual" id="atual" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new-password">Nova senha</label>
                    <input type="password" name="newPassword" id="new-password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new-password-confirmation">Confirme nova senha</label>
                    <input type="password" name="newPassword_confirmation" id="new-password-confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
            </form>
        </div>
    </div>
@stop
