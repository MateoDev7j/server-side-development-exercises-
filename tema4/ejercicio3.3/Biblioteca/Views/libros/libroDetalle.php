<h2> Libro buscado: <?= e($_GET['id'] ?? '') ?></h2>
<p><?= $resultado['mensaje'] ?></p>
<p><?php if($resultado['libroDetalle'] !== null): ?></p>
    <p><strong><?= $resultado['libroDetalle']->getTitulo(); ?></strong></p>
        - ID(<?= $resultado['libroDetalle']->getId(); ?>)
        - Autor ID: <?= $resultado['libroDetalle']->getAutorId(); ?>
        - <?= $resultado['libroDetalle']->getDisponible(); ?>
<p><?php endif; ?></p>