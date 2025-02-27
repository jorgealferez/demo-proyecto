<?php
// views/users/list.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="index.php?action=create">Crear Nuevo Usuario</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->id); ?></td>
                <td><?php echo htmlspecialchars($user->name); ?></td>
                <td><?php echo htmlspecialchars($user->email); ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $user->id; ?>">Editar</a>
                    <a href="index.php?action=destroy&id=<?php echo $user->id; ?>" onclick="return confirm('¿Está seguro de eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No hay usuarios.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>