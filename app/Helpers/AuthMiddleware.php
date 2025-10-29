<?php
namespace App\Helpers;

class AuthMiddleware
{
    public static function verificarSesion($rolesPermitidos = [])
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    error_log("🟣 SESIÓN ACTUAL: " . print_r($_SESSION, true));

    if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
        error_log("🚨 Sin sesión, redirigiendo a login");
        header("Location: /Warmi360-Refactor/public/?view=login");
        exit;
    }

    if (!empty($rolesPermitidos) && !in_array((int)$_SESSION['rol'], $rolesPermitidos)) {
        error_log("🚫 Rol no autorizado: " . $_SESSION['rol']);
        header("Location: /Warmi360-Refactor/public/?view=main");
        exit;
    }
}


    public static function cerrarSesion()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: /Warmi360-Refactor/public/?view=login");
        exit;
    }
}
