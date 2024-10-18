<?php
require_once './app/models/login.model.php';
require_once './app/views/login.view.php';
class LoginController {

    private $model;
    private $view;

    // Constructor
    public function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    // Muestra el formulario de Login
    public function showLoginForm(){
        $this->view->showLoginForm();
    }

    // Metedo de Login
    public function login() {
        if ($_POST && !empty($_POST)){

            $nombre = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];     //Obtiene user y contraseña del formulario Login

            $usuario = $this->model->getUsuario($nombre);  

            if ($usuario && password_verify($contraseña,$usuario->contraseña_admin)){  //Verifica que el user y la contraseña coincidan
                session_start();                                                       //con la base de datos. Si son correctos se 
                $_SESSION['id'] = $usuario->id_admin;                                  //inicia sesion
                $_SESSION['username'] = $nombre;
                
                header("Location:".BASE_URL."celulares");
            }
            else {                      
                $this->view->showLoginForm();
                echo "ERROR!";
            }
        }

    }

    // Metodo que cierra sesion
    public function logout(){
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . "celulares");
    }

}