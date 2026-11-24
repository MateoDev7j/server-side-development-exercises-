<?php
// Variables opcionales que puede recibir esta vista:
//   $errores (array campo => mensaje; 'general' para errores que no son de un campo),
//   $datos (array con los valores a rellenar), $mensaje (texto de éxito) y $libro (objeto Libro).
$errores = $errores ?? [];
$datos   = $datos ?? [];
?>
<h1>Alta de libro</h1>

<?php if (!empty($mensaje)): ?>
    <p class="mensaje-ok"><?= e($mensaje) ?></p>
<?php endif; ?>

<?php if (!empty($errores['general'])): ?>
    <p class="mensaje-error"><?= e($errores['general']) ?></p>
<?php endif; ?>

<form method="post" action="<?= e(BASE_URL . 'libros') ?>" enctype="multipart/form-data">
    <p>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="<?= e($datos['titulo'] ?? '') ?>">
        <?php if (isset($errores['titulo'])): ?><span class="error"><?= e($errores['titulo']) ?></span><?php endif; ?>
    </p>
    <p>
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="<?= e($datos['autor'] ?? '') ?>">
        <?php if (isset($errores['autor'])): ?><span class="error"><?= e($errores['autor']) ?></span><?php endif; ?>
    </p>
    <p>
        <label for="genero">Género</label>
        <select id="genero" name="genero">
            <?php foreach (GENEROS as $g): ?>
                <option value="<?= e($g) ?>" <?= ($datos['genero'] ?? '') === $g ? 'selected' : '' ?>><?= e(ucfirst($g)) ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errores['genero'])): ?><span class="error"><?= e($errores['genero']) ?></span><?php endif; ?>
    </p>
    <p>
        <label for="anio">Año de edición</label>
        <input type="text" id="anio" name="anio" value="<?= e($datos['anio'] ?? '') ?>">
        <?php if (isset($errores['anio'])): ?><span class="error"><?= e($errores['anio']) ?></span><?php endif; ?>
    </p>
    <p>
        <label for="paginas">Número de páginas</label>
        <input type="text" id="paginas" name="paginas" value="<?= e($datos['paginas'] ?? '') ?>">
        <?php if (isset($errores['paginas'])): ?><span class="error"><?= e($errores['paginas']) ?></span><?php endif; ?>
    </p>
    <p>
        <label for="portada">Portada</label>
        <input type="file" id="portada" name="portada">
        <?php if (isset($errores['portada'])): ?><span class="error"><?= e($errores['portada']) ?></span><?php endif; ?>
    </p>
    <p><button type="submit">Guardar</button></p>
</form>

<?php if (!empty($libro)): ?>
    <?php require __DIR__ . '/imprimeFicha.php'; ?>
<?php endif; ?>
