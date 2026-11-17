<?php
declare(strict_types=1);
?>
<a style="text-decoration:none; margin:20px;
    padding:10px; color:white; background-color:black;" href="<?= BASE_URL ?>/RUTARUTA">ENTRA AKI</a>
<?php if(isset($visitas)): ?>
    <p>Has visitado esta página <?= ($visitas ?? 0)  ?> veces."</p>
<?php endif; ?>
<ul>
<?php if(isset($fechas)): ?>
    <?php foreach($fechas as $fecha): ?>
        <li><?=  e((string)$fecha) ?></li>
    <?php endforeach; ?>
<?php endif; ?>
</ul>
<h2>Mensaje de bienvenida</h2>