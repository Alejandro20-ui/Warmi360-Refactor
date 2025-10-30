<?php
namespace App\Controllers;

use App\Models\User;
use App\Helpers\ApiPeru;
use Exception;

class AuthController
{
    /**
     * 🧠 Método auxiliar para registrar logs en system_logs
     */
    private function registrarLog($pdo, $modulo, $mensaje, $nivel = 'info', $id_usuario = null)
    {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO system_logs (id_usuario, modulo, mensaje, nivel) 
                VALUES (:id_usuario, :modulo, :mensaje, :nivel)
            ");
            $stmt->execute([
                ':id_usuario' => $id_usuario,
                ':modulo' => $modulo,
                ':mensaje' => $mensaje,
                ':nivel' => $nivel
            ]);
        } catch (Exception $e) {
            error_log("Error registrando log: " . $e->getMessage());
        }
    }

    // 🔹 Validar DNI con ApiPeruDev
    public function validarDNI()
    {
        header('Content-Type: application/json; charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            return;
        }

        $dni = $_POST['dni'] ?? null;
        if (!$dni || strlen($dni) !== 8) {
            echo json_encode(['success' => false, 'message' => 'DNI inválido']);
            return;
        }

        try {
            $api = new ApiPeru();
            $resultado = $api->consultarDNI($dni);

            if (isset($resultado['data'])) {
                $data = $resultado['data'];
                echo json_encode([
                    'success' => true,
                    'data' => [
                        'nombres' => $data['nombres'] ?? '',
                        'apellido_paterno' => $data['apellido_paterno'] ?? '',
                        'apellido_materno' => $data['apellido_materno'] ?? ''
                    ]
                ]);
            } elseif (isset($resultado['nombres'])) {
                echo json_encode([
                    'success' => true,
                    'data' => [
                        'nombres' => $resultado['nombres'] ?? '',
                        'apellido_paterno' => $resultado['apellidoPaterno'] ?? '',
                        'apellido_materno' => $resultado['apellidoMaterno'] ?? ''
                    ]
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se encontró información del DNI.']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error al consultar la API: ' . $e->getMessage()]);
        }
    }

    // 🔹 Registrar nueva usuaria
    public function registrarUsuaria()
    {
        header('Content-Type: application/json; charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            return;
        }

        try {
            require_once __DIR__ . '/../../config/database.php';
            $pdo = \Database::connect();
            $userModel = new User($pdo);

            $data = [
                'dni' => $_POST['dni'] ?? '',
                'nombres' => $_POST['nombres'] ?? '',
                'apellidos' => $_POST['apellidos'] ?? '',
                'correo' => $_POST['correo'] ?? '',
                'telefono' => $_POST['telefono'] ?? '',
                'sexo' => $_POST['sexo'] ?? 'Femenino'
            ];

            foreach ($data as $key => $val) {
                if (empty($val)) {
                    echo json_encode(['success' => false, 'message' => "El campo $key es obligatorio."]);
                    return;
                }
            }

            $pin = random_int(100000, 999999);
            $data['pin_hash'] = password_hash($pin, PASSWORD_BCRYPT);
            $res = $userModel->crearUsuaria($data);

            if ($res['success']) {
                echo json_encode([
                    'success' => true,
                    'message' => "🎉 Registro exitoso. Tu PIN de acceso es: $pin"
                ]);
            } else {
                echo json_encode($res);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error interno: ' . $e->getMessage()]);
        }
    }

    // 🔹 Iniciar sesión con registro en logs
    public function login()
    {
        header('Content-Type: application/json; charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            return;
        }

        try {
            require_once __DIR__ . '/../../config/database.php';
            $pdo = \Database::connect();

            $correo = $_POST['correo'] ?? '';
            $pin = $_POST['pin'] ?? '';

            if (empty($correo) || empty($pin)) {
                echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
                return;
            }

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
            $stmt->execute([$correo]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$user) {
                $this->registrarLog($pdo, 'LOGIN', "Intento fallido: usuario no encontrado ($correo)", 'warning');
                echo json_encode(['success' => false, 'message' => '❌ Usuario no encontrado.']);
                return;
            }

            if (!password_verify($pin, $user['pin_hash'])) {
                $this->registrarLog($pdo, 'LOGIN', "PIN incorrecto para el usuario $correo", 'warning', $user['id_usuario']);
                echo json_encode(['success' => false, 'message' => '❌ PIN incorrecto.']);
                return;
            }

            // ✅ Iniciar sesión correctamente
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['nombres'] = $user['nombres'];
            $_SESSION['correo'] = $user['correo'];
            $_SESSION['rol'] = $user['id_role'];

            // ✅ Log de acceso exitoso
            $this->registrarLog($pdo, 'LOGIN', "Inicio de sesión exitoso de {$user['correo']}", 'info', $user['id_usuario']);

            // Redirección por rol
            switch ($user['id_role']) {
                case 3:
                    $redirect = '/warmi360-refactor-production.up.railway.app/public/?view=admin';
                    break;
                case 2:
                    $redirect = '/warmi360-refactor-production.up.railway.app/public/?view=psicologa';
                    break;
                default:
                    $redirect = '/warmi360-refactor-production.up.railway.app/public/?view=usuaria';
                    break;
            }

            echo json_encode([
                'success' => true,
                'message' => '✅ Bienvenida ' . htmlspecialchars($user['nombres']),
                'redirect' => $redirect
            ]);
            exit;
        } catch (Exception $e) {
            require_once __DIR__ . '/../../config/database.php';
            $pdo = \Database::connect();
            $this->registrarLog($pdo, 'LOGIN', 'Error interno: ' . $e->getMessage(), 'error');
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error interno: ' . $e->getMessage()]);
        }
    }
}
