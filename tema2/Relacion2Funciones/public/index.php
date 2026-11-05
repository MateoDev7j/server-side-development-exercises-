<?php
// 1. Habilitar el tipado estricto obligatoriamente en la primera linea
//declare(strict_types=1);
echo '<h1>Proyecto: Relacion2Funciones</h1>';
echo '<p>PHP ' . phpversion() . '</p>';

/*1. Funciones predefinidas
Crea un script que defina diferentes variables (una con valor null, 
otra no definida, una vacia y una con un entero). Utiliza las funciones
nativas de PHP is_null(), isset(), empty() e is_int() para evaluar sus 
estados y muestra los resultados formateados en el navegador con var_dump()
*/
/*
$variable1=null;
$variable2="LOQUESEA";
unset($variable2);
$variable3="";
$variable4=2;
echo "var_dump(is_null($variable1))".PHP_EOL;
echo "var_dump(isset($variable2))".PHP_EOL;
echo "var_dump(empty($variable3))".PHP_EOL;
echo "var_dump(is_int($variable4))".PHP_EOL;
*/
//************************
//EJERCICIO 2 CADENAS
//************************
/*function comprobarArgumento($argumento) {
    // 1. Verificar si es una cadena de caracteres (como 'isinstanceof String' en Java)
    if (is_string($argumento)) {
        
        // 2. Verificar si está vacía (como argumento.isEmpty() o argumento.equals(""))
        if ($argumento === "") {
            return "Este es el relleno porque estaba vacía";
        } else {
            // 3. Si tiene contenido, pasar a mayúsculas (como argumento.toUpperCase())
            return "La variable texto no está vacía, tiene este contenido: " . strtoupper($argumento);
        }
        
    } else {
        // 4. Si no es un string, concatenar con el mensaje (el punto '.' es el '+' de Java)
        return $argumento . " no es una string";
    }
}

// Ejemplos de prueba (iguales a los de la imagen):
echo comprobarArgumento("") . "<br>";
echo comprobarArgumento("un saludo") . "<br>";
echo comprobarArgumento(7) . "<br>";
*/
/*3. Potencias
Escribe una funcion personalizada para calcular potencias que reciba 
dos parametros: la base y el exponente.Configura el script para que 
el exponente sea opcional y adquiera por defecto el valor de 2. 
Realiza llamadas de prueba variando el numero de argumentos

// 1. Definición de la función con el exponente opcional (por defecto 2)
function calcularPotencias(int $base, int $exponente = 2): int {
    // Usamos el operador ** para calcular la potencia en PHP
    return $base ** $exponente; 
}
// 2. Pruebas variando el número de argumentos
echo "<h3>Pruebas de la función:</h3>";
// Prueba 1: Pasando solo la base (el exponente será 2 por defecto)
$resultado1 = calcularPotencias(5); 
echo "5 elevado al cuadrado (por defecto) es: " . $resultado1 . "<br>"; // Devuelve 25
// Prueba 2: Pasando ambos parámetros (base y exponente)
$resultado2 = calcularPotencias(2, 3); 
echo "2 elevado al cubo (exponente 3) es: " . $resultado2 . "<br>"; // Devuelve 8
// Prueba 3: Otro ejemplo con ambos parámetros
$resultado3 = calcularPotencias(10, 4);
echo "10 elevado a la cuarta es: " . $resultado3 . "<br>"; // Devuelve 10000
*/
/********************
EJERCICIO 4 
********************
4. Funciones predefinidas de texto
A partir de la cadena de caracteres "Hola, mundo. ¿Qué tal estás hoy?" 
escribe un script que emplee funciones nativas de manipulación de cadenas para obtener y mostrar en pantalla:
La longitud total de la cadena.
Los primeros 12 caracteres.
La posición de la palabra "mundo" (buscando en mayúscula y en minúscula).
La transformación total del texto a mayúsculas estándar y minúsculas.
La subcadena obtenida a partir del primer punto (incluido).
$texto = "Hola, mundo. ¿Qué tal estás hoy?";

// 1. Longitud total (como texto.length() en Java)
echo "Longitud: " . strlen($texto) . "<br>";

// 2. Primeros 12 caracteres (como texto.substring(0, 12))
echo "Primeros 12: " . substr($texto, 0, 12) . "<br>";

// 3. Posicion de "mundo" (como indexOf())
// En minuscula:
echo "Posicion 'mundo': " . strpos($texto, "mundo") . "<br>";
// En mayuscula ("MUNDO" no existe en el texto, dara falso/vacio):
echo "Posicion 'MUNDO': " . strpos($texto, "MUNDO") . "<br>";

// 4. Mayusculas y minusculas
echo "Mayusculas: " . strtoupper($texto) . "<br>";
echo "Minusculas: " . strtolower($texto) . "<br>";

// 5. Subcadena a partir del primer punto (incluido)
// strchr busca el caracter y te devuelve todo lo que sigue
echo "Desde el punto: " . strchr($texto, ".") . "<br>";*/
/*******************
EJERCICIO 5 TIPADO ESTRICTO 
****************************


// 2. Funcion matematica con parametros int/float y retorno ?string (string o null)
// Nota: 'int|float' es un tipo unión (introducido en PHP 8)
function calcularRaizCuadrada(int|float $numero): ?string {
    if ($numero < 0) {
        // Retorna null si el numero es negativo (no existe raiz real)
        return null; 
    }
    
    $resultado = sqrt($numero);
    // Retorna obligatoriamente un string
    return "La raiz cuadrada es: " . $resultado;
}

// --- Pruebas de funcionamiento correcto ---
echo calcularRaizCuadrada(16) . "<br>"; // Funciona con int
echo calcularRaizCuadrada(20.25) . "<br>"; // Funciona con float
var_dump(calcularRaizCuadrada(-9)); // Retorna null
echo "<br><br>";


// 3. Provocar intencionadamente un TypeError pasando un String
try {
    echo "Intentando pasar un string a la función matemática...<br>";
    
    // Esto provocará el error porque strict_types está activo
    echo calcularRaizCuadrada("25"); 
    
} catch (TypeError $e) {
    // Capturamos la excepción igual que en Java
    echo "<strong>¡Error capturado con éxito!</strong><br>";
    echo "Mensaje del error: " . $e->getMessage();
}
    */
/* EJERCICIO 11 Y 12 
********************* */
/*
$patron= "/^.{6,15}$/\d+A-Z+a-z+\w+";
    if(preg_match($patron, $cadena, $matches)){
        echo "concidencias";
    }
    else{
        echo "sin coincidencias";
    }*/
//11
$matricula = $_GET['matricula'];
function comprobarMatricula($matricula){
    $esvalida="[/[0-9]/{4}/[A-Z]{3}]";
    return preg_match($esvalida, $matricula);
}
echo comprobarMatricula($matricula)?"<h4>matricula correcta</h4>": "<h4>matricula incorrecta</h3>".PHP_EOL;
//12
$clave = $_GET['clave'];
function comprobarClaveER($clave){
    $comprobando= false;
    $mayu = preg_match("/[A-Z]/",$clave);
    $minu = preg_match("/[a-z]/",$clave);
    $nume = preg_match("/[0-9]/",$clave);
    $alf = preg_match("[^\w]" ,$clave);
    $long = preg_match('/^.{6,15}$/', $clave);
    $comprobando=($mayu && $minu && $nume && $alf && $long);
    return $comprobando; 
}
echo comprobarClaveER($clave)?"<h3>clave correcta</h3>": "</h3>clave incorrecta</h3>";


?>