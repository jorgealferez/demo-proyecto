<?php
// Vista para crear un nuevo usuario
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="index.php?action=store" method="post">
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="index.php?action=index">Volver a la lista</a>
</body>
</html>