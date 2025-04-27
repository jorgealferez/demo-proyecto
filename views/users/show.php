<?php
// views/users/show.php
// Vista para mostrar los detalles de un usuario
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Usuario</title>
</head>
<body>
    <h1>Detalles del Usuario</h1>
    <?php if($user): ?>
    <p><strong>ID:</strong> <?= htmlspecialchars($user->id) ?></p>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($user->name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
    <p><strong>Creado:</strong> <?= htmlspecialchars($user->created_at) ?></p>
    <?php else: ?>
    <p>Usuario no encontrado.</p>
    <?php endif; ?>
    <a href="/users">Volver a la lista</a>
</body>
</html>