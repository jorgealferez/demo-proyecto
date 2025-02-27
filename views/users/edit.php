<?php
// Vista para editar un usuario existente
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php if($user): ?>
    <form action="index.php?action=update&id=<?php echo $user->id; ?>" method="post">
        <p>
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user->name); ?>" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
        </p>
        <p>
            <button type="submit">Actualizar</button>
        </p>
    </form>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
    <a href="index.php?action=index">Volver</a>
</body>
</html>