<h1>Acceso</h1>

<?php if (!empty($error)): ?>
    <p style="color:#b00020"><strong><?= e($error) ?></strong></p>
<?php endif; ?>
<?php if (!empty($info)): ?>
    <p style="color:#0a6b0a"><?= e($info) ?></p>
<?php endif; ?>

<form method="post" action="<?= e(url('login')) ?>">
    <p><label>Correo <input type="email" name="email" required></label></p>
    <p><label>Contraseña <input type="password" name="password" required></label></p>
    <p><button type="submit">Entrar</button></p>
</form>
