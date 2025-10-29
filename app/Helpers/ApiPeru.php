<?php
namespace App\Helpers;

require_once __DIR__ . '/../../config/env.php';

class ApiPeru {
    private $token;

    public function __construct() {
        $this->token = $_ENV['APIPERU_TOKEN'] ?? null;

        if (!$this->token) {
            throw new \Exception("❌ No se encontró el token de ApiPeru en el archivo .env");
        }
    }

    public function consultarDNI($dni)
    {
        $url = "https://apiperu.dev/api/dni/$dni";

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$this->token}"
            ],
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // 🔍 Error de conexión
        if ($error) {
            return [
                'success' => false,
                'message' => 'Error cURL: ' . $error
            ];
        }

        // 🔍 Decodificar JSON
        $data = json_decode($response, true);

        // ✅ Guardar LOG para depuración
        $logPath = __DIR__ . '/../../logs/api_debug.log';
        if (!file_exists(dirname($logPath))) {
            mkdir(dirname($logPath), 0777, true);
        }
        file_put_contents(
            $logPath,
            date('Y-m-d H:i:s') . " | DNI: $dni | Respuesta: " . $response . "\n",
            FILE_APPEND
        );

        // 🔍 Retornar la respuesta sin modificar (para debug)
        return $data;
    }
}
