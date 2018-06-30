@extends('adminlte::page')

@section('title', 'MV Gestão')

@section('content_header')
    <h1>Bem Vindo, {{auth()->user()->name}}.</h1><span class="h5">Logado como {{auth()->user()->cargo}}.</span>
@stop

@section('content')
    <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Suas Vendas</span>
          <span class="info-box-number">{{$vendas}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>

      {{-- Ultimos Produtos --}}
      <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produtos adicionados recentemente.</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach ($produtos as $produto )
                    <li class="item">
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{$produto->nome}}
                        <span class="label label-{{$produto->preco > 500 ? 'warning' : 'success'}} pull-right">{{$produto->preco}}</span></a>
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
              <a href="javascript:void(0)" class="uppercase">Ver todos os produtos</a>
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
                  @foreach ($ultimasVendas as $venda )
                    <tr>
                        <td>{{$venda->id}}</td>
                        <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalProdutos">Produtos</a></td>
                        <td>{{$venda->funcionario->name}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            {{-- MODAL PRODUTOS --}}
            <!-- Modal -->
            <div class="modal fade" id="modalProdutos" tabindex="-1" role="dialog" aria-labelledby="modalProdutos" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProdutos">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                                <th>Nome do Produto</th>
                                <th>Descricao</th>
                            </thead>
                            <tbody>
                                @foreach ($ultimasVendas as $vendas)
                                <tr>
                                    <td>{{$vendas->produtos->nome}}</td>
                                    <td>{{$vendas->produtos->descricao}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          </div>
      </div>

@stop
