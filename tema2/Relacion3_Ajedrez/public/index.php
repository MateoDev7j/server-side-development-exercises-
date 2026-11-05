
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Tablero de Ajedrez</h1>
<?php
    require 'funciones.php';
    $piezasNegras = ["torren.png", "caballon.png", "alfiln.png", "reinan.png", "reyn.png", "alfiln.png", "caballon.png", "torren.png"];
    $piezasBlancas = ["torreb.png", "caballob.png", "alfilb.png", "reinab.png", "reyb.png", "alfilb.png", "caballob.png", "torreb.png"];

    echo "<table>";
    for ($fila = 0; $fila < 8; $fila++) {
        echo "<tr>";
        for ($columna = 0; $columna < 8; $columna++) {
            $color = obtenerColorCasilla($fila, $columna);
            $pieza = obtenerImagenPieza($fila, $columna, $piezasNegras, $piezasBlancas);
            // Pintamos la casilla limpia en una sola linea
            echo "<td class='$color'>$pieza</td>";  
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
