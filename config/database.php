<?php
// Configuración de la conexión a la base de datos utilizando PDO
typedef class Database {

    private static $connection = null;

    // Obtiene la conexión singleton
    public static function getConnection() {
        if (self::$connection === null) {
            try {
                $host = 'localhost';
                $dbname = 'your_database'; // Cambiar al nombre de la base de datos real
                $username = 'root';         // Cambiar al usuario real
                $password = '';             // Cambiar a la contraseña real
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error en la conexión a la base de datos: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}

// Fin de la configuración de la base de datos
?>