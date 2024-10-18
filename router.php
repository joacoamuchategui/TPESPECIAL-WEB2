<?php
require_once './config.php';
require_once 'app/controllers/tienda.controller.php';
require_once 'app/controllers/login.controller.php';
require_once 'app/controllers/admin.controller.php';
require_once 'app/controllers/celular.controller.php';
require_once 'app/controllers/marcas.controller.php';
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';


$TiendaController = new TiendaController();
$LoginController = new LoginController();
$AdminController = new AdminController();
$CelularController = new CelularController();
$MarcasController = new MarcasController();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'celulares';
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'celulares';
        sessionAuthMiddleware($res);
        $TiendaController->showTienda();
        break;
    case 'celular';
        sessionAuthMiddleware($res);
        $CelularController->ShowCelular($params[1]);
        break;
    case 'marcas';
        sessionAuthMiddleware($res);
        $MarcasController->showMarca();
        break;
    case 'auth';
        $LoginController->showLoginForm();
        break;
    case 'login';
        $LoginController->login();
        break;
    case 'logout';
        $LoginController->logout();
        break;
    case 'admin';
        sessionAuthMiddleware($res);
        $AdminController->showAdministracion();
        break;
    case 'formAgregarArticulo';
        sessionAuthMiddleware($res);
        $AdminController->showFormArticulo();
        break;
    case 'formEditarArticulo';
        sessionAuthMiddleware($res);
        $AdminController->showFormEditarArticulo($params[1]);
        break;
    case 'formAgregarMarca';
        sessionAuthMiddleware($res);
        $AdminController->showFormMarca();
        break;
    case 'formEditarMarca';
        sessionAuthMiddleware($res);
        $AdminController->showFormEditarMarca($params[1]);
        break;
    case 'addArticulo';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->addArticulo();
        break;
    case 'editArticulo';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->editArticulo($params[1]);
        break;
    case 'deleteArticulo';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->deleteArticulo($params[1]);
        break;
    case 'addMarca';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->addMarca();
        break;
    case 'editMarca';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->editMarca($params[1]);
        break;
    case 'deleteMarca';
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $AdminController->deleteMarca($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
