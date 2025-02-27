<?php
// migrations/migration_create_users_table.php
// Script para crear la tabla 'users' en la base de datos

$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users ("
         . "id INT AUTO_INCREMENT PRIMARY KEY,"
         . "name VARCHAR(100) NOT NULL,"
         . "email VARCHAR(100) NOT NULL UNIQUE,"
         . "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
         . ") ENGINE=INNODB;";

    $pdo->exec($sql);
    echo "Tabla 'users' creada exitosamente.";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}