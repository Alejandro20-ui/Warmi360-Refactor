<?php
// ======================================================
// ✅ INICIO DE SESIÓN GLOBAL
// ======================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ======================================================
// ✅ INCLUSIÓN DE DEPENDENCIAS
// ======================================================
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/AdminController.php';
require_once __DIR__ . '/../app/Helpers/ApiPeru.php';
require_once __DIR__ . '/../app/Models/User.php';

use App\Controllers\AuthController;
use App\Controllers\AdminController;

// ======================================================
// ✅ PARÁMETRO PRINCIPAL
// ======================================================
$view = $_GET['view'] ?? 'main';
$base_url = '/Warmi360-Refactor/public';

// ======================================================
// ✅ RUTAS DE HEADER Y FOOTER
// ======================================================
$sharedHeader = __DIR__ . '/../app/Views/shared/header-main.php';
$sharedFooter = __DIR__ . '/../app/Views/shared/footer.php';
$headerUser   = __DIR__ . '/../app/Views/shared/usuaria-header.php';
$footerUser   = __DIR__ . '/../app/Views/shared/usuaria-footer.php';

// ======================================================
// ✅ ENRUTADOR PRINCIPAL
// ======================================================
switch ($view) {

    // ==================================================
    // 🌸 PÁGINAS PÚBLICAS
    // ==================================================
    case 'main':
        include $sharedHeader;
        include __DIR__ . '/../app/Views/main/index.php';
        include $sharedFooter;
        break;

    case 'tienda':
    case 'biblioteca':
    case 'eventos':
    case 'descargar':
    case 'politicas':
    case 'buzon':
        include $sharedHeader;
        include __DIR__ . "/../app/Views/main/{$view}.php";
        include $sharedFooter;
        break;

    // ==================================================
    // 🔐 AUTENTICACIÓN
    // ==================================================
    case 'login':
        include __DIR__ . '/../app/Views/auth/login.php';
        break;

    case 'register':
        include __DIR__ . '/../app/Views/auth/register.php';
        break;

    case 'procesar-login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'registrar':
        $controller = new AuthController();
        $controller->registrarUsuaria();
        break;

    case 'validar-dni':
        $controller = new AuthController();
        $controller->validarDNI();
        break;

    // ==================================================
    // 👩‍🦰 DASHBOARD USUARIA
    // ==================================================
    case 'usuaria':
        if (!isset($_SESSION['rol'])) {
            header("Location: $base_url/?view=login");
            exit;
        }
        if ($_SESSION['rol'] != 1) {
            header("Location: $base_url/?view=main");
            exit;
        }

        include $headerUser;
        include __DIR__ . '/../app/Views/user/dashboard.php';
        include $footerUser;
        break;

    // ==================================================
    // 🧠 PANEL DE ADMINISTRACIÓN
    // ==================================================
    case 'admin':
        if (!isset($_SESSION['rol'])) {
            header("Location: $base_url/?view=login");
            exit;
        }
        if ($_SESSION['rol'] != 3) {
            header("Location: $base_url/?view=main");
            exit;
        }

        $controller = new AdminController();
        $controller->dashboard();
        break;

    // ==================================================
    // 🚪 CIERRE DE SESIÓN
    // ==================================================
    case 'logout':
        session_unset();
        session_destroy();
        header("Location: $base_url/?view=login");
        exit;

    // ==================================================
    // 🚫 ERROR 404
    // ==================================================
    default:
        http_response_code(404);
        include $sharedHeader;
        echo "<main class='pt-24 text-center text-xl text-text-dark'>
                <h1>404 - Página no encontrada</h1>
              </main>";
        include $sharedFooter;
        break;
}
