<?php
// routes.php
// Definición de las rutas de la aplicación

require_once 'controllers/UserController.php';

function route($url) {
    $uri = parse_url($url, PHP_URL_PATH);

    // Ruta para listar usuarios
    if($uri == '/' || $uri == '/users') {
        $controller = new UserController();
        $controller->index();
    // Ruta para mostrar el formulario de creación
    } elseif($uri == '/users/create') {
        $controller = new UserController();
        $controller->create();
    // Ruta para almacenar un usuario nuevo (POST)
    } elseif($uri == '/users/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new UserController();
        $controller->store();
    // Ruta para mostrar el formulario de edición
    } elseif(preg_match('#^/users/edit/(\d+)$#', $uri, $matches)) {
        $controller = new UserController();
        $controller->edit($matches[1]);
    // Ruta para actualizar un usuario (POST)
    } elseif($uri == '/users/update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new UserController();
        $controller->update();
    // Ruta para mostrar detalles del usuario
    } elseif(preg_match('#^/users/show/(\d+)$#', $uri, $matches)) {
        $controller = new UserController();
        $controller->show($matches[1]);
    // Ruta para eliminar un usuario
    } elseif(preg_match('#^/users/delete/(\d+)$#', $uri, $matches)) {
        $controller = new UserController();
        $controller->delete($matches[1]);
    } else {
        echo "404 Not Found";
    }
}