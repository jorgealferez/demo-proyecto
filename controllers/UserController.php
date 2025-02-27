<?php
// Controlador para manejar las operaciones CRUD de usuarios
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
    
    // Almacena un nuevo usuario
    public function store($data) {
        User::create($data);
        header('Location: index.php?action=index');
        exit();
    }
    
    // Muestra el formulario para editar un usuario existente
    public function edit($id) {
        $user = User::find($id);
        include 'views/users/edit.php';
    }
    
    // Actualiza los datos del usuario
    public function update($id, $data) {
        User::update($id, $data);
        header('Location: index.php?action=index');
        exit();
    }
    
    // Elimina un usuario
    public function delete($id) {
        User::delete($id);
        header('Location: index.php?action=index');
        exit();
    }
}
?>