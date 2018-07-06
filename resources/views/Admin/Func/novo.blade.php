@extends('adminlte::page')
<style>

</style>
@section('content_header')
    <div class="container text-center">
        <h2>Cadastrar Funcionario</h2>
        <div class="row">
            <div class="col-xs-12">
                @include('Admin.layouts.errors')
            </div>
        </div>
    </div>

@stop
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('novo.funcionario')}}" class="col-xs-12" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="">Nome Completo</label>
                            <input type="text" name="name"  value="{{old('name')}}" placeholder="Nome Completo" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <label for="">CPF</label>
                        <input type="text" name="cpf" value="{{old('cpf')}}" id="cpf" class="form-control" placeholder="xxx.xxx.xxx-xx">
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="">Cargo</label>
                            <select class="form-control" name="cargo" >
                                <option value="Operador"    {{ old('cargo') == "Operador"? 'checked' : ''}}>Operador</option>
                                <option value="Supervisor"  {{ old('cargo') == "Supervisor"? 'checked' : ''}}>Supervisor</option>
                                <option value="Gerente"     {{ old('cargo') == "Gerente"? 'checked' : ''}}>Gerente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="">Data de Nascimento</label>
                            <input type="date" class="form-control" value="{{old('DataDeNascimento')}}" name="DataDeNascimento" >
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="">Data de Contratação</label>
                            <input type="date" class="form-control" value="{{old('DataDeContratacao')}}" name="DataDeContratacao" >
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label for="">Supervisor</label>
                            <select class="form-control" name="Supervisor" >
                                <option value="0">Em breve..</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label  for="">CEP</label>
                            <input  data-js="CEP" type="text" class="form-control"  value="{{old('CEP')}}"name="CEP" placeholder="CEP">
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label  for="">Rua</label>
                            <input  data-js="rua" type="text" value="{{old('rua')}}"class="form-control" name="Rua" placeholder="Rua">
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label  for="">Número</label>
                            <input  type="text" class="form-control"  value="{{old('Numero')}}"name="Numero" placeholder="Nº">
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label  for="">Bairro</label>
                            <input  data-js="bairro" type="text" value="{{old('Bairro')}}"name="Bairro" class="form-control"  placeholder="Bairro">
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label  for="">Cidade</label>
                            <input  data-js="cidade"type="text" value="{{old('Cidade')}}" class="form-control" name="Cidade" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-12">
                        <div class="form-group">
                            <label  for="">Estado</label>
                            <input  data-js="estado" type="text" class="form-control" value="{{old('estado')}} "name="Estado" placeholder="UF">
                        </div>
                    </div>

                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label  for="">Senha para acesso</label>
                            <input  type="password" class="form-control"  name="password" placeholder="Senha">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label  for="">Confirmar senha</label>
                            <input  type="password" class="form-control"  name="password_confirmation" placeholder="Confirmar senha">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
            </form>
        </div>
    </div>
@stop
@section('extraJS')
<script src="{{asset('js/novoFuncionario.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $(document).ready(function (){
        $('#cpf').mask('000.000.000-00', {reverse: true});
    });
</script>
@stop
