<?php
require_once './app/models/model.php';
class ArticulosModel extends Model
{

    // Obtiene todo los datos de la tabla Articulos y la Marca de cada articulo
    public function getArticulos()
    {
        $query = $this->db->prepare("SELECT * FROM articulos INNER JOIN marcas ON articulos.marca = marcas.id_marca");
        $query->execute();
        $articulos = $query->fetchAll(PDO::FETCH_OBJ);
        return $articulos;
    }

    // Obtiene los datos de un Articulo con ID determinada
    public function getArticuloById($id_articulo)
    {
        $query = $this->db->prepare("SELECT * FROM articulos INNER JOIN marcas ON articulos.marca = marcas.id_marca WHERE id_articulo = ?");
        $query->execute([$id_articulo]);
        $articulo = $query->fetch(PDO::FETCH_OBJ);
        return $articulo;
    }

    // Agregar un nuevo Articulo a la base de datos
    public function addArticulo($nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img)
    {
        $query = $this->db->prepare("INSERT INTO articulos (nombre, marca, memoria, pantalla, camara, precio, stock, img) VALUES (?,?,?,?,?,?,?,?)");
        $query->execute([$nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img]);
        return $this->db->lastInsertId();
    }

    // Edita un Articulo de la base de datos
    public function editArticulo($id_articulo, $nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img)
    {
        $query = $this->db->prepare("UPDATE articulos SET `nombre` = ? , `marca` = ?, `memoria` = ?, `pantalla` = ?, `camara` = ?, `precio` = ?, `stock` = ?, `img` = ? WHERE `articulos`.`id_articulo` = ?");
        $query->execute([$nombre, $marca, $memoria, $pantalla, $camara, $precio, $stock, $img, $id_articulo]);
        return $query->rowCount();
    }

    // Borra un Articulo de la base de datos
    public function deleteArticulo($id_articulo)
    {
        $query = $this->db->prepare('DELETE FROM articulos WHERE id_articulo = ?');
        $query->execute([$id_articulo]);
        return $query->rowCount();
    }
}
