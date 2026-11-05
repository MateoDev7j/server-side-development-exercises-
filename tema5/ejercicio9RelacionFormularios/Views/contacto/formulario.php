<h1>Nuevo contacto</h1>
<form method="POST" action="index.php?controller=contacto&amp;action=procesar">
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
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="contacto[telefono]" 
        value="<?= e($contacto->telefono) ?? '' ?>"/>
        <?php if (isset($errores['telefono'])): ?>
            <span style="color:red;"><br><?= $errores['telefono'] ?></span>
        <?php endif; ?>
    </p>
    <fieldset>
            <legend>Situación laboral actual</legend>
            <div class="campo">
                <input type="radio" id="sin-empleo" name="contacto[situacion_laboral]" value="sin_empleo" checked>
                <label for="sin-empleo" class="inline-label">Sin empleo</label>
            </div>
            <div class="campo">
                <input type="radio" id="media-jornada" name="contacto[situacion_laboral]" value="media_jornada">
                <label for="media-jornada" class="inline-label">Media jornada</label>
            </div>
            <div class="campo">
                <input type="radio" id="tiempo-completo" name="contacto[situacion_laboral]" value="tiempo_completo">
                <label for="tiempo-completo" class="inline-label">Tiempo completo</label>
            </div>
            <?php if (isset($errores['situacion_laboral'])): ?>
                <span style="color:red;"><br><?= $errores['situacion_laboral'] ?></span>
            <?php endif; ?>
        </fieldset>
    <p>
        <label for="lenguagesDominados">Selecciona los lenguajes que dominas</label>
        <select id="lenguagesDominados" name="contacto[lenguajes][]" multiple size="5">
            <option value="python" selected>Python</option>
            <option value="php">PHP</option>
            <option value="javascript">JavaScript</option>
            <option value="java">Java</option>
            <option value="cpp">C++</option>
        </select>
    </p>
        <p class="campo">
            <label for="url_trabajo">URL de trabajos anteriores:</label>
            <input type="url" id="url_trabajo" name="contacto[url_trabajo]" placeholder="https://ejemplo.com">
            <?php if (isset($errores['url_trabajo'])): ?>
            <span style="color:red;"><br><?= $errores['url_trabajo'] ?></span>
            <?php endif; ?>
        </p>
    <p>
        <input type="checkbox" id="marcar" name="contacto[marcar]"
        value="1" required />
        <label for="marcar">Aceptar los términos y condiciones</label>
    </p><?php if (isset($errores['marcar'])): ?>
            <span style="color:red;"><br><?= $errores['marcar'] ?></span>
        <?php endif; ?>
        <input type="submit" value="Enviar" />
</form>