<?php
// models/User.php

require_once __DIR__ . '/../config/database.php';

class User {
    public $id;
    public $name;
    public $email;

    public function __construct($id = null, $name = '', $email = '') {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    // Recupera todos los usuarios
    public static function all() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Encuentra un usuario por id
    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Crea un nuevo usuario
    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$data['name'], $data['email']]);
    }

    // Actualiza un usuario existente
    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $id]);
    }

    // Elimina un usuario
    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>