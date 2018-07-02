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
@extends('adminlte::page')
@section('title', 'Novo Produto')

@section('content_header')
    <div class="container text-center">
        <h2>Adicionar Produto</h2>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('novo.produto')}}" method="POST" class="col-md-6">
                @csrf
                <div class="form-group ">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" name="nomeProduto" id="" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="codigoProduto">Código</label>
                        <div class="form-group">
                            <input type="number" name="codigoProduto" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precoProduto">Preço</label>
                            <input type="number" name="precoProduto" class="form-control" id="precoProduto">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricaoProduto">Descrição</label>
                    <textarea  class="form-control" id="descricaoProduto," name="descricaoProduto"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-xs-8">
                        <select class="form-control" data-js="select-input"id="">
                            <option value="op1">teste</option>
                            <option value="op2">ASDSA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <a data-js="btn-categoria" class="btn  btn-primary">Adicionar categoria</a>
                    </div>
                </div>
                <input type="hidden" data-js="categoria_produto" name="categoria_produto">
                <div class="form-group">
                    <label for="">Categorias adicionadas</label>
                    <div class="col-xs-12 box-tags" data-js="categoria-box">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block ">Adicionar Produto</button>
            </form>
        </div>
    </div>
    <script>
        var $select = document.querySelector('[data-js="select-input"]');
        var $categoriaBox = document.querySelector('[data-js="categoria-box"]');
        var $btn = document.querySelector('[data-js="btn-categoria"]');
        var $categoria_submit = document.querySelector('[data-js="categoria_produto"]');

        $btn.addEventListener('click', function(){
            addCategoryBox($select.options[$select.selectedIndex]);
            $categoria_submit.value += $select.options[$select.selectedIndex].value + ',';
            $select.options[$select.selectedIndex].remove();
        });
        function addCategoryBox(option){
            var $tag = option.cloneNode(true);
            $tag.addEventListener('click', (function(){
                removeTag($tag)
            }).bind(this));
            $tag.classList.add('btn', 'btn-info', 'btn-tag');
            $categoriaBox.appendChild($tag);
        }

        function removeTag(tag){
            tag.remove();
            tag.classList.remove('btn', 'btn-info', 'btn-tag');
            $select.appendChild(tag.cloneNode(true));
        }

    </script>
@stop

