<?php
require_once './app/models/model.php';

Class MarcasModel extends Model {

    // Obtiene todo los datos de la tabla Marca
    public function getMarcas()
    {
        $query = $this->db->prepare('SELECT * from marcas');
        $query->execute();
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    // Obtiene los datos de una Marca con ID determinada
    public function getMarcaById($id_marca)
    {
        $query = $this->db->prepare('SELECT * FROM marcas WHERE id_marca = ?');
        $query->execute([$id_marca]);
        $marca = $query->fetch(PDO::FETCH_OBJ);
        return $marca;
    }

    // Añade una nueva Marca a la base de datos
    public function addMarca($nombre)
    {
        $query = $this->db->prepare("INSERT INTO marcas (nombre_marca) VALUES (?)");
        $query->execute([$nombre]);
        return $this->db->lastInsertId();
    }

    // Edita una Marca de la base de datos
    public function editMarca($id_marca, $nombre,$img)
    {
        $query = $this->db->prepare("UPDATE `marcas` SET `nombre_marca` = ?, `img_marca`= ?  WHERE `marcas`.`id_marca` = ?");
        $query->execute([$nombre, $img, $id_marca]);
        return $query->rowCount();
    }

    // Borra una Marca de la base de datos
    public function deleteMarca($id_marca)
    {
        $query1 = $this->db->prepare('DELETE articulos.* FROM articulos INNER JOIN marcas ON marcas.id_marca = articulos.marca WHERE marcas.id_marca = ?');
        $query2 = $this->db->prepare('DELETE FROM marcas WHERE id_marca = ?');
        $query1->execute([$id_marca]);
        $query2->execute([$id_marca]);
        return $query2->rowCount();
    }
}