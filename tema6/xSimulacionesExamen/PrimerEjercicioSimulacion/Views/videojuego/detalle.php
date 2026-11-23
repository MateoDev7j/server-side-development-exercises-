<?php
declare(strict_types=1);
?>
<h2>Detalle de videojuego</h2>
<h2><?= e($videojuego->titulo) ?></h2>
<p><img src="<?= UPLOADS_URL . e($videojuego->imagen) ?>" width="200" alt=""></p>
<p><strong>Género:</strong> <?= e($videojuego->genero) ?></p>
<p><strong>Precio:</strong> <?= (int)$videojuego->precio ?> €</p>
<p><a href="<?= BASE_URL ?>/videojuego/lista">Volver al listado</a></p>