# Proyecto CRUD

Este proyecto implementa un CRUD de usuarios y un CRUD de pedidos. Los pedidos están relacionados con los usuarios mediante una clave foránea en la tabla de pedidos.

Se incluyen los siguientes ficheros:

- db.php: Configuración y conexión a la base de datos.
- user_crud.php: Funciones para gestionar usuarios (crear, leer, actualizar y eliminar).
- order_crud.php: Funciones para gestionar pedidos, relacionados con usuarios, también con operaciones CRUD.

Asegúrate de tener las siguientes tablas en tu base de datos:

-- Tabla users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
);

-- Tabla orders
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  order_date DATE NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);