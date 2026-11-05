<?php
    //devuelve color casiila segun posicion d matriz
    function obtenerColorCasilla(int $fila, int $columna): string {
        if (($fila + $columna) % 2 == 0) {
            return "gris";
        } else {
            return "blanca";
        }
    }

    //devuelve imagen q va en cada casilla segun posicion d matri<z
    function obtenerImagenPieza(int $fila, int $columna, array $piezasNegras, array $piezasBlancas): string {
        if ($fila == 0) {
            return "<img src='/img/fichasAjedrez/".$piezasNegras[$columna]."'>";
        } elseif ($fila == 1) {
            return "<img src='/img/fichasAjedrez/peon-negro.png'>";
        } elseif ($fila == 6) {
            return "<img src='/img/fichasAjedrez/peon-blanco.png'>";
        } elseif ($fila == 7) {
            return "<img src='/img/fichasAjedrez/".$piezasBlancas[$columna]."'>";
        }
        
        return "";//si es de las del medio devuelve vacio
}
