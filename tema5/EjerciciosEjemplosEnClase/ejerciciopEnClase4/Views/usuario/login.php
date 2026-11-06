<h1>Nuevo contacto</h1>
<form method="POST" action="index.php?controller=usuario&amp;action=procesar">
    <p>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario[usuario]"
        value="<?= e($usuario->nombre) ?? '' ?>"/>
        <?php if (isset($errores['usuario'])): ?>
            <span style="color:red;"><br><?= $errores['usuario'] ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="usuario[password]" />
    </p>
        <?php if(isset($errores['password'])): ?>
            <span style="color:red;"><br><?= $errores['password'] ?></span>
        <?php endif; ?>
    <p>
        <input type="checkbox" id="marcar" name="contacto[marcar]"
        value="1" required />
        <label for="marcar">Aceptar los términos y condiciones</label>
    </p>
        <input type="submit" value="Enviar"/>
</form>