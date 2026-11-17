<h1><?= e($titulo) ?></h1>

<table border="1" cellpadding="6">
    <thead>
        <tr><th>Título</th><th>Año</th></tr>
    </thead>
    <tbody>
    <?php foreach ($peliculas as $p): ?>
        <tr>
            <td><?= e($p['titulo']) ?></td>
            <td><?= e((string) $p['anio']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
