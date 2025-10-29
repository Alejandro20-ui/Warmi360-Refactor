<?php
// config/database.php

class Database {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            $envPath = __DIR__ . '/../.env';
            if (!file_exists($envPath)) {
                self::logError('Archivo .env no encontrado.');
                return null;
            }

            // Cargar variables del archivo .env
            $env = parse_ini_file($envPath);

            $host = $env['DB_HOST'] ?? 'localhost';
            $port = $env['DB_PORT'] ?? '3306';
            $dbname = $env['DB_NAME'] ?? 'railway';
            $user = $env['DB_USER'] ?? 'root';
            $pass = $env['DB_PASS'] ?? '';

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                $msg = "❌ Error de conexión a la base de datos: " . $e->getMessage();
                self::logError($msg);
                return null;
            }
        }

        return self::$pdo;
    }

    private static function logError($msg) {
        $logDir = __DIR__ . '/../app/logs';
        if (!is_dir($logDir)) mkdir($logDir, 0777, true);
        $logFile = $logDir . '/db_error.log';
        $line = "[" . date('Y-m-d H:i:s') . "] " . $msg . "\n";
        file_put_contents($logFile, $line, FILE_APPEND);
    }
}
