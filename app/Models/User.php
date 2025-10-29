<?php
namespace App\Models;

class User
{
    private \PDO $db;
    private string $table = 'usuarios';

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Crear usuaria nueva
     * Campos requeridos: dni, nombres, apellidos, correo, telefono, sexo, pin_hash
     */
    public function crearUsuaria(array $data): array
    {
        try {
            // 🔹 Validar conexión PDO
            if (!$this->db) {
                return ['success' => false, 'message' => 'No hay conexión con la base de datos.'];
            }

            // 🔹 Verificar duplicados (correo o DNI)
            $stmt = $this->db->prepare("SELECT id_usuario FROM {$this->table} WHERE correo = ? OR dni = ?");
            $stmt->execute([$data['correo'], $data['dni']]);
            if ($stmt->fetch()) {
                return ['success' => false, 'message' => 'El correo o DNI ya está registrado.'];
            }

            // 🔹 Preparar INSERT
            $sql = "INSERT INTO {$this->table}
                (dni, nombres, apellidos, correo, telefono, sexo, pin_hash, id_role, id_estado, fecha_registro)
                VALUES (:dni, :nombres, :apellidos, :correo, :telefono, :sexo, :pin_hash, :id_role, :id_estado, NOW())";

            $stmt = $this->db->prepare($sql);

            $params = [
                ':dni' => $data['dni'],
                ':nombres' => $data['nombres'],
                ':apellidos' => $data['apellidos'],
                ':correo' => $data['correo'],
                ':telefono' => $data['telefono'],
                ':sexo' => $data['sexo'],
                ':pin_hash' => $data['pin_hash'],
                ':id_role' => $data['id_role'] ?? 1,   // ✅ 1 = Usuaria (según tu BD)
                ':id_estado' => $data['id_estado'] ?? 1 // ✅ 1 = activo
            ];

            $stmt->execute($params);

            return [
                'success' => true,
                'message' => 'Usuaria registrada correctamente.'
            ];

        } catch (\PDOException $e) {
            // 🔥 Guardar errores SQL
            $this->logError("PDOException al registrar usuaria: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error SQL: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            // 🔥 Guardar errores generales
            $this->logError("Error general al registrar usuaria: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error general: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Buscar usuaria por correo
     */
    public function findByCorreo(string $correo): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE correo = ?");
            $stmt->execute([$correo]);
            return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
        } catch (\Exception $e) {
            $this->logError("Error al buscar usuaria por correo: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Buscar usuaria por ID
     */
    public function findById(int $id): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_usuario = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
        } catch (\Exception $e) {
            $this->logError("Error al buscar usuaria por ID: " . $e->getMessage());
            return null;
        }
    }

    /**
     * 🧾 Registrar errores en archivo de log
     */
    private function logError(string $message): void
    {
        $logPath = __DIR__ . '/../../logs/user_model_error.log';
        $line = "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
        file_put_contents($logPath, $line, FILE_APPEND);
    }
}
