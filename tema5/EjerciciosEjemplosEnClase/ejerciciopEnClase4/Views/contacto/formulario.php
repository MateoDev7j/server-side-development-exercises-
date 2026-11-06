<h1>Nuevo contacto</h1>
<form method="POST" action="index.php?controller=contacto&amp;action=procesar" enctype="multipart/form-data">
    <p>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="contacto[nombre]" 
        value="<?= e($contacto->nombre) ?? '' ?>"/>
        <?php if (isset($errores['nombre'])): ?>
            <span style="color:red;"><br><?= $errores['nombre'] ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="contacto[apellidos]" 
        value="<?= e($contacto->apellidos) ?? '' ?>"/>
    </p>
    <p>
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="contacto[correo]" required 
        value="<?= e($contacto->correo) ?? '' ?>"/>
        <?php if (isset($errores['correo'])): ?>
            <span style="color:red;"><br><?= $errores['correo'] ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="lenguagesDominados">Selecciona el metodo de Pago.</label>
        <select id="lenguagesDominados" name="contacto[metodosPago][]" multiple size="3">
            <option value="VISA" selected>VISA</option>
            <option value="MasterCard">Mastercard</option>
            <option value="Paypal">Paypal</option>
        </select>
    </p>
    <p>
        <input type="checkbox" id="marcar" name="contacto[marcar]"
        value="1" required />
        <label for="marcar">Aceptar los términos y condiciones</label>
    </p><?php if (isset($errores['marcar'])): ?>
            <span style="color:red;"><br><?= $errores['marcar'] ?></span>
        <?php endif; ?>
    <p class="campo">
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
        <?php if (isset($errores['foto'])): ?>
            <span style="color:red;"><br><?= $errores['foto'] ?></span>
        <?php endif; ?>
    </p>
        <input type="submit" value="Enviar" />
</form>