<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "<h2>🔍 DEPURACIÓN DE SESIÓN</h2>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (!isset($_SESSION['id_usuario'])) {
    echo "<p style='color:red;'>❌ No existe sesión activa</p>";
    exit;
}

if ($_SESSION['rol'] != 3) {
    echo "<p style='color:red;'>⚠️ Rol no autorizado. Valor actual: {$_SESSION['rol']}</p>";
    exit;
}

echo "<p style='color:green;'>✅ Sesión válida. Mostrando dashboard...</p>";

// --- si todo va bien, sigue mostrando tu dashboard ---
require_once __DIR__ . '/../../../config/database.php';
$pdo = Database::connect();
include __DIR__ . '/../shared/header-admin.php';

echo "<div style='padding:30px;'>Bienvenido al panel de admin</div>";

include __DIR__ . '/../shared/footer.php';
