/*COMANDO PARA CREAR UN PROYECTO
cd C:\proyectos\docker-php
.\new-project.ps1 -Nombre NombreProyecto
COMANDO PARA LEVANTAR UN CONTENEDOR PARA DOCKER 
docker compose up -d --build
*/
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
    echo '<h1>Proyecto: relacion1</h1>';
    echo '<p>PHP ' . phpversion() . '</p>';
    //crea 3 variables: pais, habitantes y continente y asignales un valor inicial adecuado
    $pais = "Espanya";
    $habitantes = 40000000;
    $contintente = "Europa";
    echo '<pre>';
    echo 'el pais es: '.$pais.'tipo :'.gettype($pais).'<br>';
    echo 'Los habitantes son: '.$habitantes.'<br>';
    echo 'El continente es: '.$contintente.'<br>';
    echo '</pre>';

    // 1. Definir una constante para el tipo de cambio actual (1 EUR = 1.14 USD aprox)
    define("TIPO_CAMBIO_USD", 1.14);
    // 2. Definir la cantidad fija de euros a transformar
    $euros = 150.00;
    // 3. Realizar la operacion matematica
    $dolares = $euros * TIPO_CAMBIO_USD;
    // 4. Mostrar el resultado formateado a dos decimales con 'number_format'
    echo "<h2>Calculadora de Divisas</h2>";
    echo "Cantidad original: " . number_format($euros, 2) . " €<br>";
    echo "Tipo de cambio aplicado: " . TIPO_CAMBIO_USD . "<br>";
    echo "El resultado de la conversion es: <b>$" . number_format($dolares, 2) . " USD</b>";

    ?>
    <p>Tambien se puede en html pais: <?= $pais ?></p>
    <p>pais es una variable de tipo <?= gettype($pais) ?></p>
    <p>Continente es una variable de tipo <?= gettype($contintente) ?></p>
    <p>habitantes es una variable de tipo <?= gettype($habitantes) ?></p>
</body>
</html>