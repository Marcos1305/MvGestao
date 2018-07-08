@extends('adminlte::page')
@section('style')
 <style>
    .row-paginate{
        display: flex;
        justify-content: center;
    }
    thead{
        background-color: rgba(34, 45, 50, .2);
        color: black;
    }
    table, thead, tbody, td, th{
            border: 0.1rem solid #222D32 !important;
        }
    td, tr > th{
        text-align: center;
    }
 </style>
@stop
@section('content_header')
    @if(isset($nome))
        <h2 class="text-center">Vendas de  {{$nome}}</h2>
    @else
        <h2 class="text-center">Listar todas as vendas</h2>
    @endif
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table no-margin table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produtos</th>
                            <th>Vendedor</th>
                            <th>Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ultimasVendas as $venda)
                            <tr>
                                <td>{{$venda->id}}</td>
                                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProdutos{{$venda->id}}">Produtos</a></td>
                                <td>{{$venda->funcionario->name}}</td>
                                <td>{{date('d/m/y H:i:s', strtotime($venda->created_at))}}</td>
                            </tr>
                        @empty
                            <p>Nenhuma venda registrada!</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row-paginate">
            {{ $ultimasVendas->links() }}
        </div>
    </div>
    @forelse($ultimasVendas as $venda)
        <div class="modal fade" id="modalProdutos{{$venda->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProdutos" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProdutos">Produtos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                                <th>Código de Barra</th>
                                <th>Nome do Produto</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                            </thead>
                            <tbody>
                                @foreach($venda->produtos as $produtos)
                                    <tr>
                                        <td>{{$produtos->CodBarra}}</td>
                                        <td>{{$produtos->nome}}</td>
                                        <td>{{$produtos->descricao}}</td>
                                        <td>{{$produtos->preco}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
@stop
