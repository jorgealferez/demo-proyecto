<?php
require_once 'db.php';

// Clase que implementa el CRUD para la tabla pedidos
// Se establece la relación con la tabla usuarios a través del campo usuario_id
class PedidoCrud {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    // Método para crear un nuevo pedido
    // Asegúrate de que 'usuario_id' corresponda a un usuario existente
    public function createPedido($data) {
        $sql = "INSERT INTO pedidos (usuario_id, descripcion, fecha) VALUES (:usuario_id, :descripcion, :fecha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':usuario_id' => $data['usuario_id'],
            ':descripcion'=> $data['descripcion'],
            ':fecha'      => $data['fecha']
        ]);
        return $this->pdo->lastInsertId();
    }

    // Método para obtener un pedido por su ID
    public function getPedido($id) {
        $sql = "SELECT * FROM pedidos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Método para actualizar la información de un pedido
    public function updatePedido($id, $data) {
        $sql = "UPDATE pedidos SET usuario_id = :usuario_id, descripcion = :descripcion, fecha = :fecha WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $params = [
            ':usuario_id' => $data['usuario_id'],
            ':descripcion'=> $data['descripcion'],
            ':fecha'      => $data['fecha'],
            ':id'         => $id
        ];
        return $stmt->execute($params);
    }

    // Método para borrar un pedido
    public function deletePedido($id) {
        $sql = "DELETE FROM pedidos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Método para listar todos los pedidos, pudiendo incluir datos del usuario
    public function listPedidos() {
        // Realizamos un join entre pedidos y usuarios para obtener información del usuario
        $sql = "SELECT p.*, u.nombre as usuario_nombre, u.email as usuario_email
                FROM pedidos p
                JOIN usuarios u ON p.usuario_id = u.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}

// Ejemplo de uso:
// $pedidoCrud = new PedidoCrud();
// $nuevoPedidoId = $pedidoCrud->createPedido(['usuario_id' => 1, 'descripcion' => 'Pedido de prueba', 'fecha' => date('Y-m-d H:i:s')]);
?>