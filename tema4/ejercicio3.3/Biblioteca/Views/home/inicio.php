<div class="bienvenida">
<h2 class="bienvenida-p">Bienvenido a la Biblioteca "Tus Libros"</h2>
<p>Gestiona y explora el catálogo de autores y obras literarias disponibles.</p>

<hr>

<h3>Menú de Navegación:</h3>
<ul>
    <!-- 1. Enlace para probar el LISTADO completo -->
    <li>
        <a href="?controller=libro&action=listaLibros">
            📋 Ver todo el listado de libros aleatorios
        </a>
    </li>
</ul>

<hr>

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
</div>