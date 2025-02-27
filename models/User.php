<?php
// Modelo de Usuario que interactúa con la base de datos
require_once 'config/database.php';

class User {
    public $id;
    public $name;
    public $email;
    
    public function __construct($id, $name, $email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
    
    // Recupera todos los usuarios
    public static function all() {
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM users");
        $users = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row['id'], $row['name'], $row['email']);
        }
        return $users;
    }
    
    // Encuentra un usuario por su ID
    public static function find($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            return new User($row['id'], $row['name'], $row['email']);
        }
        return null;
    }
    
    // Crea un nuevo usuario
    public static function create($data) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([
            $data['name'],
            $data['email']
        ]);
    }
    
    // Actualiza un usuario existente
    public static function update($id, $data) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([
            $data['name'],
            $data['email'],
            $id
        ]);
    }
    
    // Elimina un usuario
    public static function delete($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>