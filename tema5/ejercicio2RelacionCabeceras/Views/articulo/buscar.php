<h2> Buscador de Artículos de Tienda</h2>
    <!-- Formulario de búsqueda siempre visible (Método GET) -->
    <div class="formulario">
        <form method="GET" action="index.php">
            <!-- Mantenemos los parámetros para tu Front Controller -->
            <input type="hidden" name="controller" value="articulo">
            <input type="hidden" name="action" value="buscar">
            
            <label Lothar for="id">ID del Artículo:</label>
            <input type="text" id="id" name="id" placeholder="Ej: 42 o 99" 
                   value="<?= isset($_GET['id']) ? e($_GET['id']) : '' ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!-- ZONA DINÁMICA DE RESPUESTAS -->

    <!-- Caso 1: Si ha ocurrido un error (400 o 404) -->
    <?php if (!empty($error)): ?>
        <div class="error-box">
            <strong>Error:</strong> <?= e($error); ?>
        </div>
    <?php endif; ?>

    <!-- Caso 2: Si el artículo ha sido encontrado (200 OK) -->
    <?php if ($articulo !== null): ?>
        <div class="resultado-box">
            <h3>Información del Artículo</h3>
            <p><strong>ID:</strong> <?= e((string)$articulo->id); ?></p>
            <p><strong>Nombre:</strong> <?= e($articulo->nombre); ?></p>
            <p><strong>Descripción:</strong> <?= e($articulo->descripcion); ?></p>
            <p><strong>Precio:</strong> <?= e(number_format($articulo->precio, 2)); ?> €</p>
        </div>
    <?php endif; ?>

</body>
</html>
