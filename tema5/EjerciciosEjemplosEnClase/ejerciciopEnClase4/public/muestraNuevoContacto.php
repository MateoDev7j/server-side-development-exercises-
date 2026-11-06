<html lang="es">
<head>
<title>Contacto Recibido</title>
</head>
<body>
<h1>Resumen del Contacto</h1>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contacto'])): ?>
<?php $contacto = $_POST['contacto']; ?>
<p><b>Nombre:</b> <?= htmlspecialchars(string $contacto['nombre']?? flags: ENT_QUOTE ?>
<p><b>Apellidos:</b> <?= htmlspecialchars(string: Scontacto['apellidos'] ?? flags: ENT_QUOTE ?>
<p><b>Correo:</b> <?= htmlspecialchars(string: Scontacto['correo']?? flags: ENT_QUOTE?>
<p><b>Métodos de pago seleccionados:</b></p>
<ul>
<?php if (!empty($contacto['metodosPago']) && is_array($contacto['metodosPago'])): ?:
<?php foreach ($contacto['metodos Pago'] as $metodo): ?>
<li><?= htmlspecialchars($metodo, flags: ENT_QUOTES, encoding: 'UTF-8') ?></li>
<?php endforeach; ?>
<?php else: ?>
<li>Ningún método seleccionado</li>