@extends('adminlte::page')

@section('title', 'MV Gestão')

@section('content_header')
    <h1>Bem Vindo, {{auth()->user()->name}}.</h1><span class="h5">Logado como {{auth()->user()->cargo}}.</span>
@stop

@section('style')
    <style>
        .tag-product{
            margin: 0 0.3rem;

        }
    </style>
@stop
@section('content')
<div class="info-box">
    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Suas Vendas</span>
        <span class="info-box-number">{{$vendasFuncLogado}}</span>
    </div>
    <!-- /.info-box-content -->
</div>

{{-- Ultimos Produtos --}}
    <div class="row">
        <div class="col-md-6">
            @include('Admin.layouts.errors')
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produtos adicionados recentemente.</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach ($ultimosProdutos as $produto )
                    <li class="item">
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{$produto->nome}}
                        <span class="label label-{{$produto->preco > 500 ? 'warning' : 'success'}} pull-right">R$ {{$produto->preco}}</span></a>
                        @foreach ($produto->departamentos as $departamento)
                            <span class="label label-primary pull-right tag-product">{{$departamento->Nome}}</span>
                        @endforeach
                            <span class="product-description">
                                {{$produto->descricao}}
                            </span>
                        </div>
                    </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{route('lista.produtos')}}" class="uppercase">Ver todos os produtos</a>
            </div>
            <!-- /.box-footer -->
             </div>
          </div>
          <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimas Vendas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produtos</th>
                    <th>Vendedor</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse ($ultimasVendas as $venda)
                    <tr>
                        <td>{{$venda->id}}</td>
                        <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProdutos{{$venda->id}}">Produtos</a></td>
                        <td>{{$venda->funcionario->name}}</td>
                    </tr>
                    @empty
                        <p>Nenhuma venda registrada!</p>
                  @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            {{-- MODAL PRODUTOS --}}
            <!-- Modal -->
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
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{route('nova.venda')}}" class="btn btn-sm btn-info btn-flat pull-left">Nova Venda</a>
              <a href="{{route('lista.venda')}}" class="btn btn-sm btn-default btn-flat pull-right">Todas as Vendas</a>
            </div>
            <!-- /.box-footer -->
          </div>
          </div>
      </div>

@stop
