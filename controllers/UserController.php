<?php
// controllers/UserController.php
// Controlador para gestionar el CRUD de usuarios

require_once 'models/User.php';

class UserController {
    // Muestra la lista de usuarios
    public function index() {
        $users = User::all();
        include 'views/users/index.php';
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create() {
        include 'views/users/create.php';
    }

    // Almacena un nuevo usuario y redirige a la lista
    public function store() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        User::create(['name' => $name, 'email' => $email]);
        header("Location: /users");
    }

    // Muestra el formulario para editar un usuario existente
    public function edit($id) {
        $user = User::find($id);
        include 'views/users/edit.php';
    }

    // Actualiza un usuario y redirige a la lista
    public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        User::update($id, ['name' => $name, 'email' => $email]);
        header("Location: /users");
    }

    // Muestra los detalles de un usuario
    public function show($id) {
        $user = User::find($id);
        include 'views/users/show.php';
    }

    // Elimina un usuario y redirige a la lista
    public function delete($id) {
        User::delete($id);
        header("Location: /users");
    }
}