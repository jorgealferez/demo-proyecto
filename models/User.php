<?php
// Modelo User: contiene la lógica para interactuar con la tabla 'users'

class User {
    private $pdo;

    public function __construct() {
        // Utilizar la conexión PDO definida globalmente
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obtener todos los usuarios
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Encontrar un usuario por su ID
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo usuario
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([
            $data['name'],
            $data['email']
        ]);
    }

    // Actualizar un usuario existente
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $id
        ]);
    }

    // Eliminar un usuario
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>