<h1>Usuarios mayores de 25</h1>
<ul>
    <?php if(isset($nombres)): ?>
        <?php foreach ($nombres as $nombre): ?>
            <li><?= e($nombre) ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No hay datos</li>
    <?php endif; ?>
</ul>