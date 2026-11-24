<?php 
declare(strict_types=1);
?>
<h2>Datos recibidos: </h2>
<p>tipo_incidencia: <?= e($incidencia->tipo_incidencia) ?></p>
<p>prioridad: <?= e($incidencia->prioridad) ?></p>
<p>cliente: <?= e($incidencia->cliente) ?></p>
<p>descripcion:  <?= e($incidencia->descripcion) ?></p>
<p>tecnicos: <?= e($incidencia->tecnicos) ?></p>
<p>horas:  <?= $incidencia->horas ?></p>
<p>sistemas: <?= e(implode(', ', $incidencia->sistemas)) ?></p>
<p>captura:  <?= e($incidencia->captura) ?></p>
<p>observaciones: <?= e($incidencia->observaciones ?? 'No hay') ?></p>
<p>iD: <?= $incidencia->id ?></p>
<p>coste estimado: <?= number_format($incidencia->coste, 2) ?> €</p>
<a href="<?= RUTA_IMG . '/' . e($incidencia->captura) ?>" target="_blank">Ver captura</a>