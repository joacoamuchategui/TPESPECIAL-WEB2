<?php
class TiendaView
{
    //Muestra Pagina de Articulos
    function ShowTienda($articulos,$marcas)
    {
        include_once 'templates/layout/header.phtml';

        include_once 'templates/tienda.phtml';

        include_once 'templates/layout/footer.phtml';
    }
}
