<?php
declare(strict_types=1);
?>
<form action="index.php" method="GET">
    <input type="hidden" name="controller" value="cookie">
    <input type="hidden" name="action" value="index">
    
    <button type="submit" name="idioma" value="es">Español</button>
    <button type="submit" name="idioma" value="en">Inglés</button>
</form>
<?php
echo "Idioma de cookie: $idioma .";
/*//setcookie(string $name, string $value = '', array $options = []): bool
// Debe ejecutarse ANTES de enviar cualquier salida (echo, HTML...)
setcookie('tema', 'oscuro', [
 'expires' => time() + 60 * 60 * 24 * 30, // 30 días
 'path' => '/',
 'secure' => true, // solo HTTPS
 'httponly' => true, // no accesible desde JavaScript
 'samesite' => 'Lax', // protección básica frente a CSRF
]);
//Leer una cookie: array superglobal $_COOKIE. Evita $_REQUEST, que mezcla GET, POST y cookies y hace difícil
//saber de dónde viene el dato.
$temasValidos = ['claro', 'oscuro'];
$tema = $_COOKIE['tema'] ?? 'claro';
// El valor lo controla el usuario: se valida contra una lista blanca
if (!in_array($tema, $temasValidos, true)) {
 $tema = 'claro';
}
//Borrar una cookie: se vuelve a enviar con una fecha de caducidad en el pasado y los mismos path y
//domain con los que se creó.
setcookie('tema', '', ['expires' => time() - 3600, 'path' => '/']);
*/
?>
<h1>ola</h1>