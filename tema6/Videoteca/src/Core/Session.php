<?php
declare(strict_types=1);

namespace Core;

final class Session
{
    // Tiempo máximo que puede pasar sin que el usuario haga ninguna petición
    // Valor para pruebas (segundos). En producción sería mucho mayor.
    private const INACTIVIDAD_MAX = 60;

    // ---------- Etapa 1 y 4: arranque ----------
    public static function iniciar(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        // TODO (Etapa 4, Exp. B): ini_set de use_strict_mode,
        //      use_only_cookies y use_trans_sid
        // TODO (Etapa 4, Exp. B): detectar HTTPS dinámicamente
        //      $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        // TODO (Etapa 4, Exp. B): session_set_cookie_params([...])
        //      con httponly, samesite y secure

        session_start();
    }

    // ---------- Etapa 1: métodos básicos ----------
    public static function get(string $clave, mixed $defecto = null): mixed
    {
        return $_SESSION[$clave] ?? $defecto;
    }

    public static function set(string $clave, mixed $valor): void
    {
        $_SESSION[$clave] = $valor;
    }

    public static function has(string $clave): bool
    {
        // TODO
    }

    public static function remove(string $clave): void
    {
        // TODO
    }

    // ---------- Etapa 1 y 2: cierre de sesión ----------
    public static function destruir(): void
    {
        // Etapa 1: solo session_destroy().
        // Etapa 2 (TODO): completar con los 3 pasos del apartado 3.6
        session_destroy();
    }

    // ---------- Etapa 4: regeneración del ID ----------
    public static function regenerar(): void
    {
        // TODO: session_regenerate_id(true)
    }

    // ---------- Etapa 5: mensajes flash ----------
    public static function setFlash(string $clave, string $mensaje): void
    {
        // TODO: guardarlo dentro de $_SESSION['_flash'][$clave]
    }

    public static function getFlash(string $clave): ?string
    {
        // TODO: devolver el mensaje Y borrarlo en el mismo instante
        return null;
    }

    // ---------- Etapa 6: caducidad por inactividad ----------
    public static function comprobarCaducidad(): void
    {
        // TODO: solo si existe 'user_id' en la sesión
        // TODO: si han pasado más de INACTIVIDAD_MAX segundos desde
        //       'ultima_actividad':
        //       1) destruir la sesión
        //       2) ¿qué falta para poder dejar un flash? (ver pista)
        //       3) setFlash('error', 'Tu sesión ha caducado por inactividad')
        //       4) redirect('login');
        // TODO: si no caduca, actualizar 'ultima_actividad' con time()
    }
}
