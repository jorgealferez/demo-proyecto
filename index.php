<?php
// index.php

// Punto de entrada de la aplicación
require_once 'routes.php';

// Obtención de la URL. Se usa el parámetro 'url' en la query string
$url = isset($_GET['url']) ? $_GET['url'] : '/';

route($url);