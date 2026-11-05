<?php
    // $dirImg: ruta en el disco (la usa PHP para comprobar que el archivo existe)
    // $urlImg: ruta en la URL (la usa el navegador para pedir la imagen)

    $dirImg = __DIR__ . '/../../public/assets/img/';
    $urlImg = 'assets/img/';
?>

    <h2><?= $titulo ?></h2>

<?php if(!is_dir($dirImg)): ?>

    <p>No tenemos imágenes (carpeta 'assets/img' no encontrada).</p>

<?php elseif (!isset($cartas) || count($cartas) === 0): ?>

    <p>No hay cartas para mostrar.</p>

<?php else: ?>

    <p>Cartas mostradas: <?=  count($cartas)?> </p>

    <?php foreach($cartas as $carta): ?>
        <?php $nombreImagen = $carta->getNombreImagen();?>

        <?php if(is_file($dirImg . $nombreImagen)): ?>
            <img src="<?= $urlImg . $nombreImagen?>"
                alt="Carta: <?= $carta ?>"
                width="100"
            >
        <?php else: ?>
                <span>Sin imagen: <?= $carta ?></span>
        <?php endif;?>
    <?php endforeach; ?>
<?php endif; ?>