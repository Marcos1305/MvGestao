(function(){
    'use strict';
    var $cep = document.querySelector('[data-js="CEP"]');
    var $rua = document.querySelector('[data-js="rua"]');
    var $bairro = document.querySelector('[data-js="bairro"]');
    var $cidade = document.querySelector('[data-js="cidade"]');
    var $estado = document.querySelector('[data-js="estado"]');
    function buscarEndereco(value){
        var ajax = new XMLHttpRequest();
        ajax.open('GET', 'http://viacep.com.br/ws/'+value+'/json/');
        ajax.send();
        ajax.onreadystatechange = function(){
            if(ajax.readyState === 4 && ajax.status === 200){
                popularInputs(JSON.parse(ajax.responseText));
            }
        }
    }

    function popularInputs(values){
        $rua.value = values.logradouro;
        $bairro.value = values.bairro;
        $cidade.value = values.localidade;
        $estado.value = values.uf;
    }
    $cep.addEventListener('keyup', function(e){
       if($cep.value.length >= 8)
            buscarEndereco($cep.value);
    });

})()
