<?php
declare(strict_types=1);

/** Escapa un texto para mostrarlo en HTML (protección contra XSS). */
function e(?string $texto): string
{
    return htmlspecialchars($texto ?? '', ENT_QUOTES, 'UTF-8');
}

