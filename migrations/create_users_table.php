<?php
// Script de migración: crear la tabla 'users' en la base de datos

// Incluir la configuración de la base de datos
require_once '../config/database.php';

try {
    // SQL para crear la tabla de usuarios
    $sql = "CREATE TABLE IF NOT EXISTS users ("
         . " id INT AUTO_INCREMENT PRIMARY KEY,"
         . " name VARCHAR(100) NOT NULL,"
         . " email VARCHAR(100) NOT NULL UNIQUE,"
         . " created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
         . " ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    // Ejecutar la consulta
    $pdo->exec($sql);
    echo "Tabla 'users' creada con éxito.";
} catch (PDOException $e) {
    die("Error al crear la tabla: " . $e->getMessage());
}
?>