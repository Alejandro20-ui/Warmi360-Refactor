<?php
class ApiPeruService {
    public static function getDniData($dni) {
        $token = $_ENV['APIPERU_TOKEN'];
        $url = "https://apiperu.dev/api/dni/" . $dni;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token"
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            return null;
        }

        $data = json_decode($response, true);
        return $data['data'] ?? null;
    }
}
