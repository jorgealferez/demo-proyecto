<?php
// index.php - Router principal

require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();

// Determinar la acción a realizar
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Mapeo de la acción al método del controlador
switch ($action) {
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
    case 'destroy':
        $controller->destroy();
        break;
    default:
        echo "Acción no válida.";
        break;
}
?>