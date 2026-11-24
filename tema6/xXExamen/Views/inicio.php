<?php
// Página de comprobación del entorno. No forma parte del examen.
$comprobaciones = [
    'PHP 8.4 o superior (versión ' . PHP_VERSION . ')'            => PHP_VERSION_ID >= 80400,
    'Fichero de datos legible (data/biblioteca.txt)'              => is_readable(RUTA_BIBLIOTECA),
    'Fichero de datos con permiso de escritura'                   => is_writable(RUTA_BIBLIOTECA),
    'Carpeta de imágenes con permiso de escritura (public/img)'   => is_writable(RUTA_IMG),
    'Subida de ficheros activada (file_uploads)'                  => filter_var(ini_get('file_uploads'), FILTER_VALIDATE_BOOLEAN),
];
?>
<h1>Comprobación del entorno</h1>

<p>Si ves esta página con estilos, la URL base está bien configurada. Valor actual de <code>BASE_URL</code>: <code><?= e(BASE_URL) ?></code></p>

<table class="comprobaciones">
    <?php foreach ($comprobaciones as $texto => $ok): ?>
        <tr>
            <td><?= e($texto) ?></td>
            <td class="<?= $ok ? 'ok' : 'ko' ?>"><?= $ok ? '✔ Correcto' : '✖ Revisar' ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>
    Cuando todo esté en verde, empieza el examen.
    Pantallas: <a href="<?= e(BASE_URL . 'libros') ?>">Catálogo</a> · <a href="<?= e(BASE_URL . 'libros/nuevo') ?>">Alta de libro</a>
</p>
