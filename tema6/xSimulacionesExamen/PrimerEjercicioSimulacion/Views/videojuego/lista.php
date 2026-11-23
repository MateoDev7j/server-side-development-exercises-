<?php
declare(strict_types=1);
?>
<h2>Listado de videojuegos</h2>
<?php if (empty($videojuegos)): ?>
    <p>No hay videojuegos. <a href="<?= BASE_URL ?>/videojuego/nuevo">Añade uno</a>.</p>
<?php else: ?>
    <ul>
    <?php foreach ($videojuegos as $v): ?>
        <li>
            <img src="<?= UPLOADS_URL . e($v->imagen) ?>" width="80" alt="">
            <a href="<?= BASE_URL ?>/videojuego/<?= $v->id ?>"><?= e($v->titulo) ?></a>
            — <?= e($v->genero) ?> — <?= (int)$v->precio ?> €
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
<p><a href="<?= BASE_URL ?>/videojuego/nuevo">Añadir videojuego</a></p>