<?php 
declare(strict_types=1);
?>
<h2>Formulario de incidencia: </h2>
<form action="<?= BASE_URL ?>/incidencia/procesar" method="POST" enctype="multipart/form-data">
    <label for="incidencia[tipo_incidencia]">Tipo de incidencia *</label>
          <select id="tipo_incidencia" name="incidencia[tipo_incidencia]" required>
            <option value="" disabled selected>Selecciona un tipo...</option>
            <option value="Hardware" <?= $incidencia->tipo_incidencia === 'Hardware' ? 'selected' : '' ?>>Hardware</option>
            <option value="Software" <?= $incidencia->tipo_incidencia === 'Software' ? 'selected' : '' ?>>Software</option>
            <option value="Red" <?= $incidencia->tipo_incidencia === 'Red' ? 'selected' : '' ?>>Red</option>
            <option value="Seguridad" <?= $incidencia->tipo_incidencia === 'Seguridad' ? 'selected' : '' ?>>Seguridad</option>
          </select>
    <label for="incidencia[prioridad]">Prioridad *</label>
          <select id="prioridad" name="incidencia[prioridad]" required>
            <option value="" disabled selected>Selecciona prioridad...</option>
            <option value="Baja">Baja</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
            <option value="Critica">Crítica</option>
          </select>
    <label for="incidencia[cliente]">Cliente *</label>
            <input type="text" value="<?= e($incidencia->cliente) ?>" id="cliente" name="incidencia[cliente]" placeholder="Nombre del cliente o empresa" required>
        <?php if (isset($errores['cliente'])): ?>
                <span style="color:red;"><?= e($errores['cliente']) ?></span>
        <?php endif; ?>
    <label for="incidencia[descripcion]">Descripción *</label>
            <textarea id="descripcion" name="incidencia[descripcion]" rows="4" placeholder="Detalla el problema ocurrido..." required></textarea>
    <label for="incidencia[tecnicos]">Técnicos asignados (1 a 5) *</label>
            <input type="number" id="tecnicos" name="incidencia[tecnicos]" min="1" max="5" step="1" value="1" required>
    <label for="incidencia[horas]">Horas estimadas *</label>
            <input type="number" id="horas" name="incidencia[horas]" min="0.1" step="0.1" placeholder="Ej. 2.5" required>
    <label>Sistemas afectados</label>
          <label><input type="checkbox" name="incidencia[sistemas][]" value="Windows" <?= in_array('Windows', $incidencia->sistemas, true) ? 'checked' : '' ?>> Windows</label>
          <label><input type="checkbox" name="incidencia[sistemas][]" value="Linux" <?= in_array('Linux', $incidencia->sistemas, true) ? 'checked' : '' ?>> Linux</label>
          <label><input type="checkbox" name="incidencia[sistemas][]" value="macOS" <?= in_array('macOs', $incidencia->sistemas, true) ? 'checked' : '' ?>> macOS</label>
          <label><input type="checkbox" name="incidencia[sistemas][]" value="Movil" <?= in_array('Movil', $incidencia->sistemas, true) ? 'checked' : '' ?>> Móvil</label>
    <label for="incidencia[captura]">Captura de pantalla</label>
            <input type="file" id="captura" name="captura" accept="image/*">
    <label for="incidencia[observaciones]">Observaciones (opcional)</label>
            <textarea id="observaciones" name="incidencia[observaciones]" rows="3" placeholder="Notas adicionales o comentarios internos..."></textarea>
    <input type="submit">
</form>