<?php
require_once './app/models/articulos.model.php';
require_once './app/models/marcas.model.php';
require_once './app/views/celular.view.php';

class CelularController{
 
    private $modelA;
    private $view;

    // Constructor
    function __construct()
    {
        $this->modelA= new ArticulosModel();
        $this->view= new CelularView();

    }

    // Muestra Celular con determinada ID
    function showCelular($id_articulo){
        $celulares = $this->modelA->getArticuloById($id_articulo);
        $this->view->showCelular($celulares);
    }



}

?>