<?php
// Archivo de rutas: define las acciones basadas en el parámetro GET 'action'

// Incluir la configuración de la base de datos y las clases necesarias
require_once 'config/database.php';
require_once 'models/User.php';
require_once 'controllers/UserController.php';

// Obtener la acción desde la URL, por defecto se listan los usuarios
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Instanciar el controlador de usuarios
$controller = new UserController();

// Despachar la acción solicitada
switch($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        echo "Acción no válida";
        break;
}
?>