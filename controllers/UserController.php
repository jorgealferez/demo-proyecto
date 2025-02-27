<?php
// controllers/UserController.php

require_once __DIR__ . '/../models/User.php';

class UserController {
    // Muestra la lista de usuarios
    public function index() {
        $users = User::all();
        include __DIR__ . '/../views/users/list.php';
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create() {
        include __DIR__ . '/../views/users/create.php';
    }

    // Almacena un nuevo usuario
    public function store() {
        // Validación básica
        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            User::create(['name' => $_POST['name'], 'email' => $_POST['email']]);
            header("Location: index.php?action=index");
        } else {
            echo "Todos los campos son requeridos.";
        }
    }

    // Muestra el formulario para editar un usuario
    public function edit() {
        if (isset($_GET['id'])) {
            $user = User::find($_GET['id']);
            if ($user) {
                include __DIR__ . '/../views/users/edit.php';
            } else {
                echo "Usuario no encontrado.";
            }
        } else {
            echo "ID de usuario no especificado.";
        }
    }

    // Actualiza un usuario existente
    public function update() {
        if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email'])) {
            User::update($_POST['id'], ['name' => $_POST['name'], 'email' => $_POST['email']]);
            header("Location: index.php?action=index");
        } else {
            echo "Todos los campos son requeridos.";
        }
    }

    // Elimina un usuario
    public function destroy() {
        if (isset($_GET['id'])) {
            User::delete($_GET['id']);
            header("Location: index.php?action=index");
        } else {
            echo "ID de usuario no especificado.";
        }
    }
}
?>