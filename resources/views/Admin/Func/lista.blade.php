@extends('adminlte::page')
@section('style')
    <style>
    table, thead, tbody, td, th{
    border: 0.1rem solid #222D32 !important;
    }
    thead{
        background-color: rgba(193,201,206);
    }
    th, td{
        text-align: center !important;
    }
    .btn-secondary{
        margin-top: 0.5rem;
    }
    </style>
@stop
@section('content_header')
    <div class="container">
        <h2 class="text-center">Lista de Funcionarios</h2>
    </div>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Cargo</th>
                        <th>Data de Contratação</th>
                        <th>Supervisor</th>
                        <th>Endereço</th>
                    </thead>
                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{$funcionario->name}}</td>
                                <td>{{$funcionario->cpf}}</td>
                                <td>{{$funcionario->cargo}}</td>
                                <td>{{date('d/m/Y', strtotime($funcionario->DataDeContratacao))}}</td>
                                <td>{{$funcionario->Supervisor}}</td>
                                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProdutos{{$funcionario->id}}">Endereço</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($funcionarios as $funcionario)
        <div class="modal fade" id="modalProdutos{{$funcionario->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProdutos" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProdutos">{{$funcionario->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($funcionario->endereco()->get() as $endereco)
                                <div class="col-xs-12 col-md-6">
                                    <label for="">Rua</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->Rua}}">
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="">Numero</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->Numero}}">
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->CEP}}">
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->Bairro}}">
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->Cidade}}">
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Estado</label>
                                    <input type="text" class="form-control" disabled value="{{$endereco->Estado}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary " data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

