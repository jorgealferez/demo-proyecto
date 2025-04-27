<?php
// views/users/create.php
// Vista para el formulario de creación de un nuevo usuario
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="/users/store" method="post">
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="/users">Volver a la lista</a>
</body>
</html>