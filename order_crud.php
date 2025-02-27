<?php

require_once 'db.php';

// Función auxiliar para obtener un usuario (se utiliza en el CRUD de pedidos)
function getUserForOrder($id) {
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT id, name, email FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para crear un nuevo pedido relacionado con un usuario
function createOrder($user_id, $order_date, $amount) {
    // Verificar que el usuario existe
    $user = getUserForOrder($user_id);
    if (!$user) {
        return false; // El usuario no existe
    }

    $conn = getConnection();
    $stmt = $conn->prepare('INSERT INTO orders (user_id, order_date, amount) VALUES (?, ?, ?)');
    $stmt->bind_param('isd', $user_id, $order_date, $amount);
    if ($stmt->execute()) {
        $result = $conn->insert_id;
    } else {
        $result = false;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para obtener un pedido por su ID
function getOrder($order_id) {
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT id, user_id, order_date, amount FROM orders WHERE id = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para obtener todos los pedidos
function getAllOrders() {
    $conn = getConnection();
    $result = $conn->query('SELECT id, user_id, order_date, amount FROM orders');
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    $conn->close();
    return $orders;
}

// Función para actualizar un pedido
function updateOrder($order_id, $user_id, $order_date, $amount) {
    // Verificar que el usuario existe
    $user = getUserForOrder($user_id);
    if (!$user) {
        return false; // Usuario no válido
    }

    $conn = getConnection();
    $stmt = $conn->prepare('UPDATE orders SET user_id = ?, order_date = ?, amount = ? WHERE id = ?');
    $stmt->bind_param('isdi', $user_id, $order_date, $amount, $order_id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para eliminar un pedido
function deleteOrder($order_id) {
    $conn = getConnection();
    $stmt = $conn->prepare('DELETE FROM orders WHERE id = ?');
    $stmt->bind_param('i', $order_id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// Ejemplo de uso:
// $orderId = createOrder(1, '2023-10-01', 200.00);
// $order = getOrder($orderId);
// $allOrders = getAllOrders();
// updateOrder($orderId, 1, '2023-10-05', 250.50);
// deleteOrder($orderId);

?>