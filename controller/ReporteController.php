<?php
require_once './config/DB.php';

class ReporteController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function proyectosPorCliente() {
        $proyectos = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cliente'])) {
            $id_cliente = $_POST['id_cliente'];
            try {
                $conn = $this->db->conectar();
                $stmt = $conn->prepare("SELECT * FROM obtener_proyectos_por_cliente(?)");
                $stmt->execute([$id_cliente]);
                $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Error al obtener proyectos por cliente: " . $e->getMessage();
            }
        }
        $viewPath = '../view/reportes.php';
        if (!file_exists($viewPath)) {
            die("Error: No se encuentra el archivo en la ruta '$viewPath'");
        }
        require_once $viewPath;
    }

    public function asignacionesPorUsuario() {
        $asignaciones = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
            $id_usuario = $_POST['id_usuario'];
            try {
                $conn = $this->db->conectar();
                $stmt = $conn->prepare("SELECT * FROM obtener_asignaciones_por_usuario(?)");
                $stmt->execute([$id_usuario]);
                $asignaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Error al obtener asignaciones por usuario: " . $e->getMessage();
            }
        }
        $viewPath = '../view/reportes.php';
        if (!file_exists($viewPath)) {
            die("Error: No se encuentra el archivo en la ruta '$viewPath'");
        }
        require_once $viewPath;
    }

    public function proyectosPorRangoFechas() {
        $proyectosRango = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            try {
                $conn = $this->db->conectar();
                $stmt = $conn->prepare("SELECT * FROM obtener_proyectos_por_rango_fechas(?, ?)");
                $stmt->execute([$fecha_inicio, $fecha_fin]);
                $proyectosRango = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Error al obtener proyectos por rango de fechas: " . $e->getMessage();
            }
        }
        $viewPath = '../view/reportes.php';
        if (!file_exists($viewPath)) {
            die("Error: No se encuentra el archivo en la ruta '$viewPath'");
        }
        require_once $viewPath;
    }
}
?>