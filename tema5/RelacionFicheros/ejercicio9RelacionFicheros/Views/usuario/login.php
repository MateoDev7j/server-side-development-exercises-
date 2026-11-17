<h1>Nuevo contacto</h1>
<form method="POST" action="index.php?controller=usuario&amp;action=procesar">
    <p>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario[nombre]"
        value="<?= e($usuario->nombre) ?? '' ?>"/>
        <?php if (isset($errores['nombre'])): ?>
            <span style="color:red;"><br><?= $errores['nombre'] ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="usuario[password]" />
    </p>
        <?php if(isset($errores['password'])): ?>
            <span style="color:red;"><br><?= $errores['password'] ?></span>
        <?php endif; ?>
        <input type="submit" value="Enviar"/>
</form>