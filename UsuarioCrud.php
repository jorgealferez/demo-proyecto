<?php
require_once 'db.php';

// Clase que implementa el CRUD para la tabla usuarios
class UsuarioCrud {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    // Método para crear un nuevo usuario
    public function createUsuario($data) {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nombre'   => $data['nombre'],
            ':email'    => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        return $this->pdo->lastInsertId();
    }

    // Método para obtener un usuario por su ID
    public function getUsuario($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Método para actualizar la información de un usuario
    public function updateUsuario($id, $data) {
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email";
        if (!empty($data['password'])) {
            $sql .= ", password = :password";
        }
        $sql .= " WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $params = [
            ':nombre' => $data['nombre'],
            ':email'  => $data['email'],
            ':id'     => $id
        ];
        if (!empty($data['password'])) {
            $params[':password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $stmt->execute($params);
    }

    // Método para borrar un usuario
    // Al borrar un usuario, opcionalmente se pueden borrar sus pedidos asociados
    public function deleteUsuario($id) {
        // Primero borramos los pedidos asociados al usuario para mantener la integridad
        $sqlPedidos = "DELETE FROM pedidos WHERE usuario_id = :id";
        $stmtPedidos = $this->pdo->prepare($sqlPedidos);
        $stmtPedidos->execute([':id' => $id]);

        // Ahora borramos el usuario
        $sqlUsuario = "DELETE FROM usuarios WHERE id = :id";
        $stmtUsuario = $this->pdo->prepare($sqlUsuario);
        return $stmtUsuario->execute([':id' => $id]);
    }

    // Método para listar todos los usuarios
    public function listUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}

// Ejemplo de uso:
// $usuarioCrud = new UsuarioCrud();
// $nuevoId = $usuarioCrud->createUsuario(['nombre' => 'Juan', 'email' => 'juan@example.com', 'password' => '123456']);
?>