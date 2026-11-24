<?php 
declare(strict_types=1);
?>
<?php
// TODO (apartado 3): recibe la variable $libros (array de objetos Libro).
// Recórrela y pinta cada ficha reutilizando imprimeFicha.php.
// Si no hay libros, muestra «Todavía no hay libros en la biblioteca».
?>
<h1>Catálogo</h1>
<?php if(!empty($libros)): ?>
    <?php foreach($libros as $v): ?>
        <p>titulo: <?= e($v->titulo) ?></p>
        <p>autor: <?= e($v->autor) ?></p>
        <p>genero: <?= e($v->genero) ?></p>
        <p>anio: <?= (int)$v->anio ?></p>
        <p>paginas: <?= (int)$v->paginas ?></p>
        <img src="<?= RUTA_IMG . e($v->portada) ?>">
        <P>ID: <?= (int)$v->id ?></P>
    <?php endforeach; ?>
    <?php else: ?>
        <p><strong>No hay libros todavia...</strong></p>
<?php endif; ?>

