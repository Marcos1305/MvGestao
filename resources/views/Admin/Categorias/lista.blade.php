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
        thead > td{

        }
        thead{
            background-color: #C4C9CE;
        }
        td {
            text-align: center;
        }
        @media screen and (max-width: 767px){
            .btn{
            margin-top: 0.3rem;
            }
        }
</style>
@stop
@section('content_header')
    <div class="container">
        <div class="row text-center">
                <h2>Lista de Departamentos</h2>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 tabela">
                @include('Admin.layouts.errors')
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <td>#</td>
                        <td>Nome</td>
                        @can('admin')
                            <td>Ações</td>
                        @endcan
                    </thead>
                    <tbody>

                        @foreach ($departamentos as $departamento)
                            <tr>
                                <td>{{$departamento->id}}</td>
                                <td>{{$departamento->Nome}}</td>
                                @can('admin')
                                    <td>
                                        <a href="{{route('editar.departamento', $departamento->id)}}" class="btn btn-warning">Editar</a>
                                        <a href="{{route('delete.departamento', $departamento->id)}}" onClick="return confirm('Realmente deseja excluir esse departamento?')"class="btn btn-danger">Excluir</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            {!!$departamentos->links()!!}
        </div>
    </div>
@stop

@section('extraJS')
<script src="{{asset('js/lista-departamento.js')}}"></script>
@stop
