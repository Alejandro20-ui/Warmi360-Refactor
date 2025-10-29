<?php
namespace App\Controllers;

use PDO;
use Exception;
use Database;

class AdminController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = \Database::connect();
    }

    // 📊 Mostrar dashboard principal
    public function dashboard()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 3) {
            header('Location: /Warmi360-Refactor/public/?view=login');
            exit;
        }

        include __DIR__ . '/../Views/admin/dashboard.php';
    }

    // 📈 Datos para estadísticas
    public function obtenerDatosDashboard()
    {
        header('Content-Type: application/json');

        try {
            $dias = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
            $nuevasUsuarias = [];

            foreach ($dias as $dia) {
                $nuevasUsuarias[] = ['dia' => $dia, 'cantidad' => rand(1, 10)];
            }

            echo json_encode([
                'success' => true,
                'totalUsuarias' => 150,
                'planesActivos' => 8,
                'ingresos' => 3250.75,
                'nuevasUsuarias' => $nuevasUsuarias
            ]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // 👩‍🦰 Listado de usuarias
    public function obtenerUsuarias()
    {
        header('Content-Type: application/json');
        $stmt = $this->pdo->query("SELECT nombres, correo, 'Activo' AS estado FROM usuarios WHERE id_role = 1");
        $usuarias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($usuarias);
    }
}
