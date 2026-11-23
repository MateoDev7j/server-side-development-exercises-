<?php
declare(strict_types=1);
?>
<h1>Nuevo videojuego</h1>
<form method="POST" action="<?= BASE_URL ?>/videojuego/procesar"
      enctype="multipart/form-data" novalidate>
    <p>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="videojuego[titulo]"
               value="<?= e($videojuego->titulo) ?>">
        <?php if (isset($errores['titulo'])): ?>
            <span style="color:red;"><?= e($errores['titulo']) ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="genero">Género</label>
        <input type="text" id="genero" name="videojuego[genero]"
               value="<?= e($videojuego->genero) ?>">
        <?php if (isset($errores['genero'])): ?>
            <span style="color:red;"><?= e($errores['genero']) ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="precio">Precio (€)</label>
        <input type="number" id="precio" name="videojuego[precio]" min="1"
               value="<?= (int)$videojuego->precio ?>">
        <?php if (isset($errores['precio'])): ?>
            <span style="color:red;"><?= e($errores['precio']) ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
        <?php if (isset($errores['imagen'])): ?>
            <span style="color:red;"><?= e($errores['imagen']) ?></span>
        <?php endif; ?>
    </p>
    <input type="submit" value="Guardar">
</form>