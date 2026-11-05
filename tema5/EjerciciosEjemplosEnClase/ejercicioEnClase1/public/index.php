<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formilario</title>
</head>
<body>
    <h1>Formulario</h1>
    
    <form method="POST" action="../public/nuevoAmigo.php">
      <p>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
      </p>
      <p>
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido">
      </p>
      <p>
        <input type="checkbox" id="marcar" name="marcar" value="1" required/>
        <label for="marcar">Aceptar los terminos y condiciones</label>
      </p>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>
<?php
//Vemos como funcionan los formularios
//en el html tener method POST y GET
//action DONDE EL CONTROLADOR RECOGE DATOS
