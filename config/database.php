<?php
// config/database.php
// Configuración de la base de datos y conexión PDO

try {
    $pdo = new PDO("mysql:host=localhost;dbname=crud_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error al conectarse con la base de datos: " . $e->getMessage());
}
?>