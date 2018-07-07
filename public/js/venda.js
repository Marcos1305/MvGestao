'use strict';
var $departamentos = document.querySelector('[data-js="departamentos"]');
var $produtos = document.querySelector('[data-js="produtos"]');
var $buttonForm = document.querySelector('[data-js="button-form"]');
var tbody = document.querySelector('tbody');
var buttonPostIDs = document.querySelector('[data-js="btn-post-ids"]');
var inputIDPost = document.querySelector('[data-js="input_post"]');
var ajax = new XMLHttpRequest();
var totalForm = document.querySelector('[data-js="total"]');
var dadosJSON;
var dados;
var ids = [];
ajax.open('GET', 'http://mvgestao.herokuapp.com/departamento-produtos');
ajax.send();
ajax.onreadystatechange = function () {
    if (ajax.readyState === 4) {
        dadosJSON = JSON.parse(ajax.responseText);
        popularDados(dadosJSON);
    }
}
function popularDados(dadosJSON) {
    dados = dadosJSON;
    $departamentos.innerHTML = '';
    dados.forEach(element => {
        $departamentos.innerHTML += '<option value=' + '"' + element.id + '"' + '>' + element.Nome + '</option>';
    });
    $departamentos.innerHTML += '<option selected>Escolha o departamento</option>';
}
$departamentos.addEventListener('change', function () {

    carregarProdutos($departamentos.value);
});

function carregarProdutos(value) {

    $produtos.innerHTML = '';
    dadosJSON.forEach(function (element, index) {
        if (element.id == value) {
            element.produtos.forEach(function (element) {
                $produtos.innerHTML += '<option value=' + '"' + element.id + '"' + '>' + 'Código: ' + element.CodBarra + ' ' +  element.nome + '</option>';
            });
        }
    });
}
$buttonForm.addEventListener('click', function (e) {
    e.preventDefault();
    var $produto = $produtos.value;
    for (let i = 0; i < dadosJSON.length; i++) {
        const element = dadosJSON[i].produtos;
        for (let j = 0; j < element.length; j++) {
            const elementj = element[j];
            if(elementj.id == $produto)
               return preencherTabela(elementj)
        }
    }

})

function preencherTabela(element){

    ids.push(element.id);
    var tr = document.createElement('tr');
    var tdID = document.createElement('td');
    tdID.textContent = element.id;
    tdID.setAttribute("data-js", "id");
    var tdCod = document.createElement('td');
    tdCod.textContent = element.CodBarra;
    var tdNome = document.createElement('td');
    tdNome.textContent = element.nome;
    var tdDescricao = document.createElement('td');
    tdDescricao.textContent = element.descricao;
    var tdPreco = document.createElement('td');
    tdPreco.textContent = element.preco;
    tdPreco.setAttribute("data-js", "precotd");
    var tdRemove = document.createElement('td');
    tdRemove.addEventListener('click', (function(){
        removerProdutoTabela(tdRemove)
    }).bind(this));
    tdRemove.innerHTML = '<button class="btn btn-danger">Remover</button>';

    tr.appendChild(tdID);
    tr.appendChild(tdCod);
    tr.appendChild(tdNome);
    tr.appendChild(tdDescricao);
    tr.appendChild(tdPreco);
    tr.appendChild(tdRemove);
    tbody.appendChild(tr)

    calcularTotal();
}

function calcularTotal(){
    var prefix = 'Total:  R$: ';
    var total = 0;
    var tdsPreco = document.querySelectorAll('[data-js="precotd"]');
    tdsPreco.forEach(element => {
        total+= +element.textContent;
    });
    totalForm.textContent = prefix + ' ' +total;
}

function removerProdutoTabela(button){
    var row = button.parentNode;
    var id = row.querySelector('[data-js="id"]').textContent;
    ids.forEach(function(element, index){
        if(element == id){
            ids.splice(index, 1);
        }
    });
    row.parentNode.removeChild(row);
    calcularTotal();
}

buttonPostIDs.addEventListener('click', function(e){
    inputIDPost.value = ids;
    if(ids.length === 0){
        e.preventDefault();
        alert('Venda minima de 1 produto');
    }
});

