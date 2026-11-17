<?php
declare(strict_types=1);
?>
<div>
    <form method="GET" action="<?= BASE_URL ?>/haciendoCosas" novalidate>
        <input type="text" name="cookie[nombre]">
    <?php if(!empty($errores['nombre'])): ?>
        <p style="color:red;"><?= $errores['nombre'] ?></p>
    <?php endif; ?>
        <input type="number" min="1" max="60" name="cookie[tiempo]">
    <?php if(!empty($errores['tiempo'])): ?>
        <p style="color:red;"><?= $errores['tiempo'] ?></p>
    <?php endif; ?>
        <br>
        <input type="submit" name="accion" value="crear">
        <input type="submit" name="accion" value="borrar">
        <input type="submit" name="accion" value="actualizarPag">
    </form>
    <?php if($usuario!==''): ?>
        <p>El <strong>usuario</strong> es <?= e($usuario); ?></p>
    <?php else: ?>
        <p>¡No hay ninguna cookie almacenada!</p>
    <?php endif; ?>
    <?php if($mensaje!==''): ?>
        <p><strong><?= e($mensaje); ?></strong></p>
    <?php endif; ?>
</div>
<h2>Mensaje de bienvenida ejercicio 5</h2>