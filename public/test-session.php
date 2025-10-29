<?php
session_start();
header('Content-Type: text/plain; charset=utf-8');

echo "=== SESIÓN ACTUAL ===\n\n";
if (empty($_SESSION)) {
    echo "⚠️ No hay variables de sesión activas.\n";
} else {
    print_r($_SESSION);
}

echo "\n\nPHPSESSID: " . (session_id() ?: 'no existe') . "\n";
echo "Ruta actual: " . __DIR__;
