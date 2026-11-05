<?php
echo '<h1>Proyecto: RedefinicionDeMetodos</h1>';
echo '<p>PHP ' . phpversion() . '</p>';
require_once 'CuentaBancaria.php';
require_once 'CuentaAhorro.php';
    $clase = new CuentaBancaria("Jose");
    echo $clase->getSaldo().'<br>';
    echo $clase->ingresar(400).'<br>';
    $claseAhorro = new CuentaAhorro('Pepe',700,84);
    echo ''.$claseAhorro->resumen().'';