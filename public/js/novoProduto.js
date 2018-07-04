(function(document, window){
    var $select = document.querySelector('[data-js="select-input"]');
    var $categoriaBox = document.querySelector('[data-js="categoria-box"]');
    var $btn = document.querySelector('[data-js="btn-categoria"]');
    var $categoria_submit = document.querySelector('[data-js="categoria_produto"]');
    var $idsDepartamentos = [];
    var $class = ['primary', 'warning', 'info', 'success'];
    $btn.addEventListener('click', function(){
        addCategoryBox($select.options[$select.selectedIndex]);
        $idsDepartamentos.push($select.options[$select.selectedIndex].value);
        $select.options[$select.selectedIndex].remove();
        $categoria_submit.value = $idsDepartamentos;
    });

    function addCategoryBox(option){
        var $tag = option.cloneNode(true);
        $tag.addEventListener('click', (function(){
            removeTag($tag);
        }).bind(this));
        $classbtn = $class[Math.floor(Math.random()*$class.length)];
        $tag.classList.add('btn','btn-tag','btn-'+$classbtn);
        $categoriaBox.appendChild($tag);
    }

    function removeTag(tag){
        $idsDepartamentos.forEach(function(element, index){
            if($idsDepartamentos[index] == tag.value){
                $idsDepartamentos.splice(index, 1);
            };
        });
        $categoria_submit.value = $idsDepartamentos;
        tag.remove();
        tag.classList.remove('btn', 'btn-info', 'btn-tag');
        $select.appendChild(tag.cloneNode(true));
    }


})(document, window);
