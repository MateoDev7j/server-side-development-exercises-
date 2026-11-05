<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
 echo "<h1>¡Mi primer ejercicio en PHP!</h1>";
 echo "<h2>¡Subdominio Funcionando!</h2>";
 echo "<p>Versión de PHP en ejecución: " . phpversion() . "</p>";

 $nombre = "Maria";
 echo 'hola $nombre';
 echo "<br>hola $nombre";
 // usamos el punto para poder concatenar cadenas
 echo "<h3> Listado de videojuegos: </h3>";
 echo "<ul>" 
 . "<li>FIFA </li>"
 . "<li> Mario</li>";


echo "<pre>";
echo "la ip de mi servidor : " .$_SERVER['SERVER_ADDR'].PHP_EOL;
echo "NOMBRE DEL SERVIDOR : " .$_SERVER['SERVER_NAME'].PHP_EOL;
echo "protocolo : " .$_SERVER['SERVER_PROTOCOL'].PHP_EOL;
echo "metodo de peticion ; " .$_SERVER['REQUEST_METHOD'].PHP_EOL;
echo "ruta dentro de htdocs: " .$_SERVER['SCRIPT_NAME'].PHP_EOL;
echo "</pre>";
?>
<?php
    //Saludos dinamicos con variables de variables
    // variables con el saludo de diferentes idiomas 
    $saludo_es = "Hola";
    $saludo_en = "Hello";
    $saludo_it = "Ciao";
    //Supongamos que la variable idioma almacena el idioma que hemos almacenado
    $idioma = "it";
    $nombre_variable = "saludo_" . $idioma;
    //$$nombre_variable toma el contenido de texto de una variable y lo utliza como nombre de otra variable
    
?>
</body>
    <p><?php echo  "El saludo es " . $$nombre_variable; ?></p>
</html>
<?php 
    $entero = 4;
    $numero = 4.5;
    $cadena = "Hola";
    $booleano = true;
    $num_float = 34.0;
    echo "La salida cuando la funcion echo es : $num_float ";
    echo "<br> Salida utilizando printf():";
    printf("El valor es: %.5f", "$num_float");
    var_dump($cadena);
    $numero = 42;
print_r($numero); // Imprime: 42
$array = ["a", "b"];
print_r( $array); 
// Imprime:
// Array (
//     [0] => a
//     [1] => b
// )
$miOtroArray = ["nombre" => "Maria", "edad" => 22, 3 => "soltera"];
echo "<br> <br> El resultado es el mismo con corchetes: <br> ";
print_r($miOtroArray)
/*COMO SE CREA UNA CLASE EN PHP
    CLASS 
    class EmpleadoSP
    {
        private string $nombre;
        private string $apellidos;
        private int $edad;

        public function __construct ($nombre, $apellidos, $edad)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
        }
    }
        OTRA FORMA 
        class empleado {
            public function __construct(
            private sting $nombre, 
            private string $apellidos,
            private int $edad ){}
        }
    como se ve en nuestro index para ver una clase
    <?php 
        require 'Empleado.php';
        $miEmpleadoSP = new EmpleadoSP();
        var_dump ($miEmpleadoSP);
    ?>
*/
?>