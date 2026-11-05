<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Recibidos</title>
</head>
<body>
    <h1>Datos recibidos:</h1>
    <p>Nombre: <?= htmlspecialchars($_POST['nombre']) ?? '', ENT_QUOTES, 'UTF-8' ?></p>
    <p>Apellidos: <?= htmlspecialchars($_POST['apellido'] ?? '', ENT_QUOTES, 'UTF-8' )?></p>
    
    <p><b>El contenido de la variable $_POST es:</b></p>
    <pre><?php var_dump($_POST); ?></pre>

    <h4>No olvides que $_REQUEST nos permite capturar variables enviadas desde formularios con </h4>
    <p>Nombre ( $_REQUEST ):<?= htmlspecialchars($_REQUEST['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
    <P>Apellidos ( $_REQUEST ): <?= htmlspecialchars($_REQUEST['nombre']) ?? '', ENT_QUOTES, 'UTF-8' ?></P>
</body>
</html>
<?php
declare(strict_types=1);


declare(strict_types=1);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') /*Validar si es por POST*/{
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
    if ($nombre !== '' && $apellido !== '') {
        echo '<h1>Datos recibidos:</h1>';
        echo '<h2>Nombre: ' . htmlspecialchars($nombre)/*Limpia el html*/ . '</h2>';
        echo '<h2>Apellidos: ' . htmlspecialchars($apellido) . '</h2>';
    }
}