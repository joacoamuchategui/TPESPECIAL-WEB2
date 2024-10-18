<?php
require_once './app/models/articulos.model.php';
require_once './app/models/marcas.model.php';
require_once './app/views/admin.view.php';

class AdminController {
    private $modelA;
    private $modelM;
    private $view;

    // Constructor
    public function __construct() {
        $this->modelA = new ArticulosModel();
        $this->modelM = new MarcasModel();
        $this->view = new AdminView();
    }

    // Se encarga de obtener todo los articulos y marcas y lo muestra en Admin
    public function showAdministracion() {
        $articulos = $this->modelA->getArticulos();
        $marcas = $this->modelM->getMarcas();
        $this->view->showAdministracion($articulos, $marcas);
    }
    
    // Muestra el formulario para Agregar Articulo
    public function showFormArticulo($editar = null, $articulo = null) {
        $marcas = $this->modelM->getMarcas();               //Obtiene marcas para el Select de marcas
        $this->view->showFormArticulo($editar, $articulo, $marcas);
    }

    // Muestra el formulario de Editar Articulo
    public function showFormEditarArticulo($id_articulo) {
        $articulo = $this->modelA->getArticuloById(id_articulo: $id_articulo);  //Obtiene datos por ID
        if ($articulo) {
            $this->showFormArticulo( true, $articulo);
        }
    }

    // Muestra formulario de Agregar Marca
    public function showFormMarca($editar = null, $marca = null){
        $this->view->showFormMarca($editar, $marca);
    }

    // Muestra formulario de Editar Marca
    public function showFormEditarMarca($id_marca) {
        $marca = $this->modelM->getMarcaById($id_marca);
        if ($marca) {
            $this->showFormMarca(true, $marca);
        }
    }

    // Toma los datos del formulario Agregar Articulo y los inserta en la base de datos
    public function addArticulo() {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $marca = htmlspecialchars($_POST["marca"]);
        $memoria = htmlspecialchars($_POST["memoria"]);
        $pantalla = htmlspecialchars($_POST["pantalla"]);
        $camara = htmlspecialchars($_POST["camara"]);
        $precio = htmlspecialchars($_POST["precio"]);
        $stock = htmlspecialchars($_POST["stock"]);
        $img = htmlspecialchars($_POST["img"]);

        $id = $this->modelA->addArticulo($nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img);

        if ($id) {
            header("Location:".BASE_URL."admin");
        }
    }

    // Toma los datos del formulario Editar Articulo y los edita en la base de datos
    public function editArticulo($id_articulo) {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $marca = htmlspecialchars($_POST["marca"]);
        $memoria = htmlspecialchars($_POST["memoria"]);
        $pantalla = htmlspecialchars($_POST["pantalla"]);
        $camara = htmlspecialchars($_POST["camara"]);
        $precio = htmlspecialchars($_POST["precio"]);
        $stock = htmlspecialchars($_POST["stock"]);
        $img = htmlspecialchars($_POST["img"]);
        
        $rows = $this->modelA->editArticulo($id_articulo, $nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img);
        if ($rows > 0) {
            header("Location:".BASE_URL."admin");
        }
    }

    // Se encarga de borrar el Articulo con ID determinada
    public function deleteArticulo($id_articulo) {
        $rows = $this->modelA->deleteArticulo($id_articulo);
        if ($rows > 0 ) {
            header("Location:".BASE_URL."admin");
        }
    }

    // Toma los datos del formulario Agregar Marca y lo añade a la base de datos
    public function addMarca(){
        $nombre = htmlspecialchars($_POST["nombre"]);
        $id = $this->modelM->addMarca($nombre);

        if ($id) {
            header("Location:".BASE_URL."admin");
        }
    }

    // Toma los datos del formulario Editar Marca y lo edita en la base de datos
    public function editMarca($id_marca) {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $img = htmlspecialchars($_POST["imagen"]);
        $rows = $this->modelM->editMarca($id_marca, $nombre, $img);
        if ($rows > 0) {
            header("Location:".BASE_URL."admin");
        }
    }

    // Borra Marca con ID determinada
    public function deleteMarca($id_marca) {
        $rows = $this->modelM->deleteMarca($id_marca);
        if ($rows > 0) {
            header("Location:".BASE_URL."admin");
        }
    }
}