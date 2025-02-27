<?php
// Vista para listar todos los usuarios
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="index.php?action=create">Crear Usuario</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user->id); ?></td>
            <td><?php echo htmlspecialchars($user->name); ?></td>
            <td><?php echo htmlspecialchars($user->email); ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $user->id; ?>">Editar</a> |
                <a href="index.php?action=delete&id=<?php echo $user->id; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>