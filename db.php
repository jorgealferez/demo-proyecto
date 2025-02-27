<?php

// Configuración de la conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'mi_base_datos';

// Función para obtener la conexión
function getConnection() {
    global $host, $user, $password, $database;
    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }
    return $conn;
}

?>