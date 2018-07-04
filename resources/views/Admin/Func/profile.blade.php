<style>
    .row{
        display:flex;
        justify-content: center;
        justify-items: center;
    }
    input{
        text-align: center;
    }
</style>
@extends('adminlte::page')
@section('title', 'Detalhes perfil')

@section('content_header')
    <div class="container text-center">
        <h2>Detalhes do seu perfil</h2>
    </div>

@stop

@section('content')
    <div class="container">
        <div class="row">
            <form class="col-md-4">
                <div class="form-group">
                    <label for="nomeFuncionario">Nome</label>
                    <input type="text" class="form-control" value="{{$funcionario->name}}" disabled id="nomeFuncionario" aria-describedby="NomeFuncionario"v>
                </div>
                <div class="form-group">
                    <label for="nomeFuncionario">Cargo</label>
                    <input type="text" class="form-control" value="{{$funcionario->cargo}}" disabled id="nomeFuncionario" aria-describedby="NomeFuncionario"v>
                </div>
                <div class="form-group">
                    <label for="cpfFuncionario">CPF</label>
                    <input type="text" class="form-control" value="{{$funcionario->cpf}}" disabled id="cpfFuncionario" aria-describedby="cpfFuncionario"v>
                </div>
                <div class="form-group">
                    <label for="emailFuncionario">Email</label>
                    <input type="text" class="form-control" value="{{$funcionario->email}}" disabled id="emailFuncionario" aria-describedby="emailFuncionario"v>
                </div>
                <div class="form-group">
                    <label for="dataContratacao">Data de Contratação</label>
                    <input type="text" class="form-control" value="{{date('d/m/Y', strtotime($funcionario->DataDeContratacao))}}" disabled id="dataContratacao" aria-describedby="dataContratacao"v>
                </div>
                <div class="form-group">
                    <label for="dataContratacao">Supervisor</label>
                    <input type="text" class="form-control" value="{{$funcionario->Supervisor}}" disabled id="dataContratacao" aria-describedby="dataContratacao"v>
                </div>
            </form>
        </div>
    </div>
@stop
@section('extraJS')
    <script>
        $cpf = document.querySelector('#cpfFuncionario');
        $cpf.value = $cpf.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "\$1.\$2.\$3\-\$4");
    </script>
@stop

