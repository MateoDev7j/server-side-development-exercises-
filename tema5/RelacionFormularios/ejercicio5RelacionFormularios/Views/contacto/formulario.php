<h1>Nuevo contacto</h1>
<form method="POST" action="index.php?controller=contacto&amp;action=procesar">
    <p>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="contacto[nombre]"/>
    </p>
    <p>
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="contacto[apellidos]" />
    </p>
    <p>
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="contacto[correo]" required />
    </p>
    <p>
        <label for="metodoPago">Selecciona método de pago</label>
        <select id="metodoPago" name="contacto[metodosPago][]" multiple size="3">
            <option value="VISA" selected>VISA</option>
            <option value="Mastercard">Mastercard</option>
            <option value="Paypal">Paypal</option>
        </select>
    </p>
    <p>
        <input type="checkbox" id="marcar" name="contacto[marcar]"
        value="1" required />
        <label for="marcar">Aceptar los términos y condiciones</label>
    </p>
        <input type="submit" value="Enviar" />
</form>