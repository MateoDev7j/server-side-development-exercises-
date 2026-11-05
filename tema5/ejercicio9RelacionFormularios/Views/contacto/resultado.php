<h1>Datos recibidos</h1>
<p><strong>Nombre:</strong> <?= e($contacto->nombre); ?></p>
<p><strong>Apellidos:</strong> <?= e($contacto->apellidos) ?: 'No indicados' ?></p>
<p><strong>Correo electrónico:</strong> <?= e($contacto->correo) ?></p>
<p><strong>Teléfono:</strong> <?= e($contacto->telefono) ?: 'No indicado' ?></p>
<p><strong>Situación Laboral:</strong> <?= e($contacto->situacion_laboral) ?></p>

<p><strong>Lenguajes que domina:</strong>
 <?= e(implode(', ', $contacto->lenguajes)) ?: 'Ninguno' ?>
</p>

<p><strong>URL de trabajo:</strong> <?= e($contacto->url_trabajo) ?: 'No indicada' ?></p>
<p><strong>Términos y condiciones:</strong>
 <?= $contacto->marcar ? 'Aceptados' : 'No aceptados' ?>
</p>
<p>
 <a href="index.php?controller=contacto&amp;action=formulario">Volver al formulario</a>
</p>