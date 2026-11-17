<?php
declare(strict_types=1);

/** Escapa un texto para mostrarlo en HTML (protección contra XSS). */
function e(?string $texto): string
{
    return htmlspecialchars($texto ?? '', ENT_QUOTES, 'UTF-8');
}

/** Construye una URL interna: url('login') => BASE_URL . 'login' */
function url(string $ruta = ''): string
{
    return BASE_URL . ltrim($ruta, '/');
}

/** Redirige a una ruta interna y detiene el script (ya incluye exit). */
function redirect(string $ruta): never
{
    header('Location: ' . url($ruta));
    exit;
}
