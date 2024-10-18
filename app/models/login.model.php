<?php

require_once './app/models/model.php';

class LoginModel extends Model
{
    // Obtiene los datos de la tabla Usuario
    public function getUsuario($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre_admin = ?');
        $query->execute([$nombre]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}
