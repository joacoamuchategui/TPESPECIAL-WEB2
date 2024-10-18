<?php
class CelularView{

    //Muestra Celular con ID determinada
    function showCelular($celulares)
    {
        include_once 'templates/layout/header.phtml';
        include_once 'templates/celular.phtml';
        include_once 'templates/layout/footer.phtml';
    }
}
