<?php 

Class AdminView {

    // Muestra Pagina Admin
    public function showAdministracion($articulos, $marcas) {
        include_once 'templates/layout/header.phtml';  
        include_once 'templates/admin.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    // Muestra Formulario de Agregar/Editar Articulo
    public function showFormArticulo($editar = null, $articulo = null, $marcas = null)
    {
        include_once 'templates/layout/header.phtml';
        include_once 'templates/formArticulo.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    // Muestra Formulario de Agregar/Editar Marca
    public function showFormMarca($editar = null, $marca = null)
    {
        include_once 'templates/layout/header.phtml';
        include_once 'templates/formMarca.phtml';
        include_once 'templates/layout/footer.phtml';
    }

}