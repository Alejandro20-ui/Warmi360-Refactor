<?php
require_once __DIR__ . '/config/database.php';

$pdo = Database::connect();

if ($pdo) {
    echo "✅ Conexión exitosa a la base de datos.";
} else {
    echo "❌ No se pudo conectar a la base de datos. Revisa el log en app/logs/db_error.log";
}
