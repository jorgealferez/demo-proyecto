<?php
// views/users/create.php
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
        <div>
            <label>Nombre:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Crear</button>
    </form>
    <a href="index.php?action=index">Volver a la lista</a>
</body>
</html>