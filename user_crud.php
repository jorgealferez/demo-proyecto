<?php

require_once 'db.php';

// Función para crear un nuevo usuario
function createUser($name, $email) {
    $conn = getConnection();
    $stmt = $conn->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
    $stmt->bind_param('ss', $name, $email);
    if ($stmt->execute()) {
        $result = $conn->insert_id;
    } else {
        $result = false;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para obtener un usuario por su ID
function getUser($id) {
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT id, name, email FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para obtener todos los usuarios
function getAllUsers() {
    $conn = getConnection();
    $result = $conn->query('SELECT id, name, email FROM users');
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $conn->close();
    return $users;
}

// Función para actualizar un usuario
function updateUser($id, $name, $email) {
    $conn = getConnection();
    $stmt = $conn->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
    $stmt->bind_param('ssi', $name, $email, $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// Función para eliminar un usuario
function deleteUser($id) {
    $conn = getConnection();
    $stmt = $conn->prepare('DELETE FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// Ejemplo de uso:
// $userId = createUser('Juan Pérez', 'juan@example.com');
// $user = getUser($userId);
// $allUsers = getAllUsers();
// updateUser($userId, 'Juan P.', 'juan.p@example.com');
// deleteUser($userId);

?>