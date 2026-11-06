<?php if(isset($usuario->nombre) && $passwordValida):?>
    <h1>Bienvenido <?=  e($usuario->nombre ?? '') ?></h1>
    <h2>Te has logeado correctamente</h2>
<?php endif; ?>
<?php if(isset($usuario->nombre) && !$passwordValida):?>
    <h1>Usuario: <?=  e($usuario->nombre ?? '') ?></h1>
    <h2>Losiento</h2>
<?php endif; ?>

<?php if($mensaje!==null): ?>
    <p><?=  e($mensaje) ?></p>
<?php endif; ?>
<p>
    <a href="index.php?controller=usuario&amp;action=login">Volver al formulario</a>
</p>