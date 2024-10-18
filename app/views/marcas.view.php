<?php

class MarcasView
{

    //Muestra Pagina de Marcas
    function showMarca($marcas)
    {
        include_once 'templates/layout/header.phtml';
        include_once 'templates/marcas.phtml';
        include_once 'templates/layout/footer.phtml';
    }
}
