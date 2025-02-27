<?php
// Punto de entrada de la aplicación: se encarga de enrutar las solicitudes al controlador correspondiente
require_once 'controllers/UserController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = new UserController();

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        // Se asume que la información llega por POST
        $controller->store($_POST);
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            echo 'ID no suministrado.';
        }
        break;
    case 'update':
        if ($id) {
            $controller->update($id, $_POST);
        } else {
            echo 'ID no suministrado.';
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            echo 'ID no suministrado.';
        }
        break;
    default:
        echo 'Acción no encontrada.';
        break;
}
?>