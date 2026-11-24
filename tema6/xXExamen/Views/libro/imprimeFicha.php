<?php 
declare(strict_types=1);
?>
<h2>Datos recibidos: </h2>
<p>titulo: <?= e($libro->titulo) ?></p>
<p>autor: <?= e($libro->autor) ?></p>
<p>genero: <?= e($libro->genero) ?></p>
<p>anio:  <?= $libro->anio ?></p>
<p>paginas: <?= $libro->paginas ?></p>
<img src="<?= RUTA_IMG . e($libro->portada) ?>">

<p>iD: <?= $libro->id ?></p>
