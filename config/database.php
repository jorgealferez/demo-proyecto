<?php
// Configuración de conexión a la base de datos utilizando PDO
$host = 'localhost';
$dbname = 'mi_base_de_datos';
$username = 'root';
$password = '';

try {
    // Crear instancia PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>