<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<h1>Proyecto: ejercicios7ydemas</h1>';
        echo '<p>PHP ' . phpversion() . '</p>';
        /*
            echo 
        */
        /*
        ejercicio para probar GET
        if (empty($_GET["nombre"])){
            echo "Error, falta el parametro nombre";
        }
        else {
            if($_GET["nombre"]=="Maria"){
                echo "<h2>Hola ".$_GET["nombre"]. "</h2>";
            }
            else {
                echo "Falta de parametros no eres maria";
            }
        }*/
        /*
        $numero1 = (int)$_GET['num1'];
        $numero2 = (int)$_GET['num2'];
        echo "<br>".gettype($numero1)."<br>";
        echo gettype($numero2)."<br>";
        if (empty($numero1) || empty($numero2)){
            echo "Faltan parametros, revisa num1 y num2";
        }
        else if(!is_numeric($numero1) || !is_numeric($numero2)){
            echo "num1 y num2 tiene que ser numeros";
        }
        else{
            echo "El resultado de la suma es: ".$numero1 + $numero2 ."<br>";
            echo "el tipo de numero1 es ". gettype($numero1)."<br>";
            echo "El tipo de numero2 es ". gettype($numero2)."<br>";
            //los comvertimos a entero
            intval($numero1);
            intval($numero2);
            echo "el tipo de numero1 es ". gettype($numero1)."<br>";
            echo "El tipo de numero2 es ". gettype($numero2)."<br>";
        }
            function manejadorErrores(%errno, $str, $file, $line){
                echo "Ocurrio el error: $errno";
            }
            set_error_handler("manejadorErrores");
            $a = $b; //causa error, $b no esta inicializada
    
        //Ejercicio ecuacion de segundo grado
        // 1. Valores predefinidos para la ecuación ax^2 + bx + c = 0
        // Ejemplo: x^2 - 5x + 6 = 0 (Soluciones: x1 = 3, x2 = 2)
            $a = 5;
            $b = -5;
            $c = 6;

            // 2. Demostración de ECHO: Ideal para texto plano y HTML estructurado rápido.
            // Es una estructura de lenguaje (no una función), no devuelve valor y acepta múltiples argumentos separados por coma.
            echo "<h1>Resolución de Ecuación de Segundo Grado</h1>", 
                "<p>Ecuación a resolver: <b>{$a}x² + ({$b})x + ({$c}) = 0</b></p>";
            $discriminante = ($b ** 2) - (4 * $a * $c);

            print "<p>Calculando el discriminante...</p>";

            // 5. Lógica de resolución y demostración de PRINTF
            // PRINTF es perfecto para salidas con formato numérico, controlar decimales y construir cadenas limpias sin concatenar.
            try{
                if ($discriminante > 0) {
                    
                    $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                    $x2 = (-$b - sqrt($discriminante)) / (2 * $a);

                    printf("<p>El discriminante es positivo (%d). La ecuación tiene <b>dos soluciones reales distintas</b>:</p>", $discriminante);
                    printf("<ul>");
                    printf("<li>x₁ = %.2f</li>", $x1);
                    printf("<li>x₂ = %.2f</li>", $x2);
                    printf("</ul>");

                } elseif ($discriminante == 0) {
                    $x = -$b / (2 * $a);
                    
                    printf("<p>El discriminante es cero. La ecuación tiene <b>una única solución real (doble)</b>:</p>");
                    printf("<p>x = %.2f</p>", $x);

                } else {
                    
                    $parteReal = -$b / (2 * $a);
                    $parteImaginaria = sqrt(-$discriminante) / (2 * $a);

                    printf("<p>El discriminante es negativo (%d). La ecuación tiene <b>dos soluciones complejas</b>:</p>", $discriminante);
                    printf("<ul>");
                    printf("<li>x₁ = %.2f + %.2fi</li>", $parteReal, $parteImaginaria);
                    printf("<li>x₂ = %.2f - %.2fi</li>", $parteReal, $parteImaginaria);
                    printf("</ul>");
                }
            }catch(Exception $e){
                echo "Ha habido un erorr". $e->getMessage()."<br>";
            }
        //EJERCICIO PIRAMIDES
        $numero = (int)$_GET['numero'];
        $mitad = floor($numero/2);
        for($i=0;$i<$numero;$i++){
            $espacios = abs( $mitad - $i);
            $asteriscos = $numero - 2 * $espacios;
            $fila = "";
            for($j=0;$j<$espacios;$j++){
                $fila = $fila . "&nbsp;";
            }
            for($o=0;$o<$asteriscos;$o++){
                $fila = $fila . "*";
            }
            echo ($fila."<br>");
        }
            
        //EJERCICIO FECHA SUMARESTA
        $mañana= strtotime("+1 day");;
        $ayer= strtotime("-1 day");;
        echo "La fecha de hoy es ". date('Y-M-d'."<br>");
        echo "La fecha de ayer es " . date('Y-M-d', $ayer)."<br>";
        echo "La fecha de mañana es ". date('Y-M-d', $mañana) ;
        */
        //CALCULADORA
        $numero1 = (int)$_GET['numero1'];
        $numero2 = (int)$_GET['numero2'];
        

    ?>
</body>
</html>