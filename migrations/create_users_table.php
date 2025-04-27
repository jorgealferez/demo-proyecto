<?php
// Script de migración para crear la tabla de usuarios
require_once '../config/database.php';

try {
    $conn = Database::getConnection();
    $sql = "CREATE TABLE IF NOT EXISTS users (\n"
         . "    id INT AUTO_INCREMENT PRIMARY KEY,\n"
         . "    name VARCHAR(255) NOT NULL,\n"
         . "    email VARCHAR(255) NOT NULL UNIQUE\n"
         . ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $conn->exec($sql);
    echo "Tabla 'users' creada o ya existe.";
} catch (PDOException $e) {
    die("Error en la migración: " . $e->getMessage());
}
?>