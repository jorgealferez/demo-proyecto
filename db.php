<?php
// Clase para gestionar la conexión a la base de datos utilizando PDO
class Database {
    private static $instance = null;
    private $pdo;

    // Ajusta los parámetros de conexión a tu base de datos
    private $host = 'localhost';
    private $db   = 'test';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    // Devuelve la instancia única de la base de datos
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Devuelve el objeto PDO
    public function getConnection() {
        return $this->pdo;
    }
}

// Ejemplo de uso:
// $db = Database::getInstance()->getConnection();
?>