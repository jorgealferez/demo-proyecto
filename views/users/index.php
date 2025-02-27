<?php
// Vista para listar todos los usuarios
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="index.php?action=create">Crear Usuario</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $user['id']; ?>">Editar</a>
                <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>