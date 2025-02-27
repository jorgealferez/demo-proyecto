<?php
// Vista para crear un nuevo usuario
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="index.php?action=store" method="post">
        <p>
            <label for="name">Nombre:</label>
            <input type="text" name="name" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <button type="submit">Crear</button>
        </p>
    </form>
    <a href="index.php?action=index">Volver</a>
</body>
</html>