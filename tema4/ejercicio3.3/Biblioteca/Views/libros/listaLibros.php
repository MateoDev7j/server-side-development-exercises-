<h2> Listado de libros: </h2>
<ul>
<?php foreach ($libros as $libro): ?>
    <li>
        <strong><?= $libro->getTitulo(); ?></strong>
        - ID(<?= $libro->getId(); ?>)
        - Autor ID: <?= $libro->getAutorId(); ?>
        - <?= $libro->getDisponible(); ?>
    </li>
    <?php endforeach; ?>
</ul>
<h3>Sección de Pruebas Rápidas (Detalle de Libro):</h3>
<p>Como tus libros se generan de forma aleatoria con IDs del 1 al 999, introduce un ID de la lista anterior para ver su ficha de detalle:</p>

<!-- Un pequeño formulario nativo para probar la acción detalleLibro -->
<form action="index.php" method="GET">
    <!-- Campos ocultos para mantener al FrontController apuntando al sitio correcto -->
    <input type="hidden" name="controller" value="libro">
    <input type="hidden" name="action" value="detalleLibro">
    
    <label for="id_libro">Buscar por ID de Libro:</label>
    <input type="text" id="id_libro" name="id" placeholder="Ej: 123" required>
    
    <button type="submit">Ver Detalle del Libro</button>
</form>