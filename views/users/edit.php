<?php
// views/users/edit.php
// Vista para editar un usuario
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="/users/update" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user->id) ?>">
        <label>Nombre:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user->name) ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="/users">Volver a la lista</a>
</body>
</html>