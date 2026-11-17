<?php if(isset($usuario->nombre) && $passwordValida):?>
    <h1>Bienvenido <?=  e($usuario->nombre ?? '') ?></h1>
    <h2>Te has logeado correctamente</h2>
<?php endif; ?>
<?php if($mensaje!==null): ?>
    <p><?=  e($mensaje) ?></p>
<?php endif; ?>
<ul>
<?php foreach($usuarios as $u):?>
    <li><?= e($u['nombre']); ?></li>
<?php endforeach; ?>
</ul>
<p>
    <a href="index.php?controller=usuario&amp;action=login">Volver al formulario</a>
</p>