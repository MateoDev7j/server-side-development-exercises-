<h1>Datos recibidos</h1>
<p><strong>Nombre:</strong> <?= e($contacto->nombre); ?></p>
<p><strong>Apellidos:</strong>
 <?= e($contacto->apellidos) ?: 'No indicados' ?>
</p>
<p><strong>Correo electrónico:</strong> <?= e($contacto->correo) ?></p>
<p><strong>Métodos de pago:</strong>
 <?= e(implode(', ', $contacto->metodosPago)) ?: 'Ninguno' ?>
</p>
<p><strong>Términos y condiciones:</strong>
 <?= $contacto->marcar ? 'aceptados' : 'no aceptados' ?>
</p>
<p>
 <a href="index.php?controller=contacto&amp;action=formulario">
 Volver al formulario </a>
</p>