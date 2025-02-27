<?php
// Controlador de usuarios: gestiona las acciones del CRUD

require_once 'models/User.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // Método para listar todos los usuarios
    public function index() {
        $users = $this->userModel->all();
        // Incluir la vista que lista los usuarios
        include 'views/users/index.php';
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create() {
        include 'views/users/create.php';
    }

    // Procesar y guardar un nuevo usuario
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ];
            $this->userModel->create($data);
            // Redirigir a la lista de usuarios
            header("Location: index.php?action=index");
        }
    }

    // Mostrar el formulario para editar un usuario existente
    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $this->userModel->find($id);
            include 'views/users/edit.php';
        } else {
            echo "ID de usuario no proporcionado.";
        }
    }

    // Procesar y actualizar un usuario existente
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ];
            $this->userModel->update($id, $data);
            header("Location: index.php?action=index");
        }
    }

    // Eliminar un usuario
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->userModel->delete($id);
            header("Location: index.php?action=index");
        } else {
            echo "ID de usuario no proporcionado.";
        }
    }
}
?>