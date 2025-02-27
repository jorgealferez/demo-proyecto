<?php
// migrations/20231010_create_users_table.php

require_once __DIR__ . '/../config/database.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS users ("
         . "id INT AUTO_INCREMENT PRIMARY KEY,"
         . "name VARCHAR(255) NOT NULL,"
         . "email VARCHAR(255) NOT NULL UNIQUE"
         . ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $pdo->exec($sql);
    echo "Tabla 'users' creada exitosamente.";
} catch (Exception $e) {
    die("Error al crear la tabla: " . $e->getMessage());
}
?>