<?php
// models/User.php
// Modelo para el usuario con métodos CRUD usando PDO

class User {
    // Crea y retorna la conexión a la base de datos
    private static function connect() {
        $host = 'localhost';
        $dbname = 'test';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Retorna todos los usuarios
    public static function all() {
        $pdo = self::connect();
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Busca un usuario por ID
    public static function find($id) {
        $pdo = self::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Crea un nuevo usuario
    public static function create($data) {
        $pdo = self::connect();
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$data['name'], $data['email']]);
    }

    // Actualiza un usuario existente
    public static function update($id, $data) {
        $pdo = self::connect();
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['email'], $id]);
    }

    // Elimina un usuario
    public static function delete($id) {
        $pdo = self::connect();
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}