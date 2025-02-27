<?php
// views/users/edit.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="index.php?action=update" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->id); ?>">
        <div>
            <label>Nombre:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user->name); ?>" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?action=index">Volver a la lista</a>
</body>
</html>