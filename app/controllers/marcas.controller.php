<?php

require_once './app/views/marcas.view.php';

class MarcasController{

    private $model;
    private $view;

    //Constructor
    function __construct()
    {
        $this->model = new MarcasModel();
        $this->view = new MarcasView();  
    }

    //Muestra las Marcas
    function showMarca(){
        $marcas = $this->model->getMarcas();
        $this->view->ShowMarca($marcas);
    }

}