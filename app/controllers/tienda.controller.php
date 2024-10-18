<?php
require_once './app/models/articulos.model.php';
require_once './app/models/marcas.model.php';
require_once './app/views/tienda.view.php';

class TiendaController
{

    private $modelA;
    private $modelM;
    private $view;

    //Constructor
    function __construct()
    {
        $this->modelA = new ArticulosModel();
        $this->modelM = new MarcasModel();
        $this->view = new TiendaView();
    }

    // Muestra los Celulares
    function showTienda()
    {
        $marcas = $this->modelM->getMarcas();
        $articulos = $this->modelA->getArticulos();
        $this->view->ShowTienda($articulos, $marcas);
    }
}
