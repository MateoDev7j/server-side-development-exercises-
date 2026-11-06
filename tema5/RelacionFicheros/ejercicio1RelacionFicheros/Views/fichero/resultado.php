<h2>Resultado de los ficheros</h2>
<?php if(isset($resultados['no-existe'])): ?>
    <p>-Estado: <?= e($resultados['no-existe']['status']) ? 'exito' : 'error' ?></p>
    <?php if($resultados['no-existe']['status']): ?>
            <p>-Contenido: <?= e($resultados['no-existe']['data']) ?></p>
    <?php else: ?>
        <p>-Mensaje: <?= e($resultados['no-existe']['mensaje']) ?></p>
    <?php endif; ?>
<?php else: ?>
    <p>No se recibieron resultados.</p>
<?php endif; ?>
<h2>Resultado de los ficheros</h2>

<?php foreach ($resultados as $nombre => $resultado): ?>
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h3>Prueba: <?= e($nombre) ?></h3>
        
        <?php if ($resultado['status']): ?>
            <p style="color: green;"> Éxito: Archivo abierto.</p>
            <p>Contenido: <?= e($resultado['data']) ?></p>
        <?php else: ?>
            <p style="color: red;"> Error: <?= e($resultado['mensaje']) ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>