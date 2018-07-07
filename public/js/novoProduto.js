(function(document, window){
    var $select = document.querySelector('[data-js="select-input"]');
    var $categoriaBox = document.querySelector('[data-js="categoria-box"]');
    var $btn = document.querySelector('[data-js="btn-categoria"]');
    var $categoria_submit = document.querySelector('[data-js="categoria_produto"]');
    var $idsDepartamentos = [];
    var $class = ['primary', 'warning', 'info', 'success'];
    $btn.addEventListener('click', function(){
        addCategoryBox($select.options[$select.selectedIndex]);

    });


    window.addEventListener('load', function(){
        var oldIds = $categoria_submit.value.split(',');
        if($categoria_submit.value.length != 0){
            $select.childNodes.forEach(element1 => {
                oldIds.forEach(element2 => {
                    if(element2 == element1.value){
                        addCategoryBox(element1);
                    }
                });
            });
        }

    });
    function addCategoryBox(option){
        $idsDepartamentos.push(option.value);
        option.remove()
        var $tag = option.cloneNode(true);
        $tag.addEventListener('click', (function(){
            removeTag($tag);
        }).bind(this));
        $classbtn = $class[Math.floor(Math.random()*$class.length)];
        $tag.classList.add('btn','btn-tag','btn-'+$classbtn);
        $categoriaBox.appendChild($tag);
        $categoria_submit.value = $idsDepartamentos;
    }

    function removeTag(tag){
        $idsDepartamentos.forEach(function(element, index){
            if($idsDepartamentos[index] == tag.value){
                $idsDepartamentos.splice(index, 1);
            };
        });
        $categoria_submit.value = $idsDepartamentos;
        tag.remove();
        tag.removeAttribute("class");
        $select.appendChild(tag.cloneNode(true));
    }


})(document, window);
