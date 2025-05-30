<?php
require_once './config/DB.php';
require_once './model/Cliente/ClienteModel.php';
require_once './model/Proyecto/ProyectoModel.php';
require_once './model/AsignacionProyecto/AsignacionProyectoModel.php';
require_once './FPDF/fpdf.php'; // Include FPDF library

class ReporteController {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function generarPDF($id_asignacion) {
        // Fetch the assignment details
        $asignacionModel = new AsignacionProyectoModel();
        $asignacion = $asignacionModel->obtenerPorId($id_asignacion);

        if (!$asignacion) {
            die('Asignación no encontrada.');
        }

        // Get user name
        $usuarioNombre = 'Desconocido';
        try {
            $sqlUsuario = "SELECT nombre FROM Usuarios WHERE id_usuario = :id_usuario";
            $psUsuario = $this->db->prepare($sqlUsuario);
            $psUsuario->bindValue(':id_usuario', $asignacion->getId_usuario(), PDO::PARAM_INT);
            $psUsuario->execute();
            $usuarioNombre = $psUsuario->fetchColumn() ?: 'Desconocido';
        } catch (PDOException $e) {
            error_log("Error al obtener nombre de usuario: " . $e->getMessage());
        }

        // Get project name
        $proyectoNombre = 'Desconocido';
        try {
            $sqlProyecto = "SELECT nombre FROM Proyectos WHERE id_proyecto = :id_proyecto";
            $psProyecto = $this->db->prepare($sqlProyecto);
            $psProyecto->bindValue(':id_proyecto', $asignacion->getId_proyecto(), PDO::PARAM_INT);
            $psProyecto->execute();
            $proyectoNombre = $psProyecto->fetchColumn() ?: 'Desconocido';
        } catch (PDOException $e) {
            error_log("Error al obtener nombre de proyecto: " . $e->getMessage());
        }

        ob_clean();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Reporte de Asignación de Proyecto'), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, utf8_decode('ID Asignación:'), 0);
        $pdf->Cell(0, 10, $asignacion->getId_asignacion(), 0, 1);
        $pdf->Cell(50, 10, 'Usuario:', 0);
        $pdf->Cell(0, 10, utf8_decode($usuarioNombre), 0, 1);
        $pdf->Cell(50, 10, 'Proyecto:', 0);
        $pdf->Cell(0, 10, utf8_decode($proyectoNombre), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Rol en Proyecto:'), 0);
        $pdf->Cell(0, 10, utf8_decode($asignacion->getRol_en_proyecto()), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Fecha Asignación:'), 0);
        $pdf->Cell(0, 10, $asignacion->getFecha_asignacion(), 0, 1);
        $pdf->Output('D', 'Asignacion_' . $id_asignacion . '.pdf');
    }

    public function generarPDFCliente($id_cliente) {
        // Fetch the client details
        $clienteModel = new ClienteModel();
        $cliente = $clienteModel->obtenerPorId($id_cliente);

        if (!$cliente) {
            die('Cliente no encontrado.');
        }

        ob_clean();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Ficha de Cliente'), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'ID Cliente:', 0);
        $pdf->Cell(0, 10, $cliente->getId_cliente(), 0, 1);
        $pdf->Cell(50, 10, 'Nombre Empresa:', 0);
        $pdf->Cell(0, 10, utf8_decode($cliente->getNombre_empresa()), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Correo:'), 0);
        $pdf->Cell(0, 10, $cliente->getCorreo(), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Teléfono:'), 0);
        $pdf->Cell(0, 10, $cliente->getTelefono(), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Dirección:'), 0);
        $pdf->Cell(0, 10, utf8_decode($cliente->getDireccion()), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Fecha Creación:'), 0);
        $pdf->Cell(0, 10, $cliente->getFecha_creacion(), 0, 1);
        $pdf->Output('D', 'Cliente_' . $id_cliente . '.pdf');
    }

    public function generarPDFProyecto($id_proyecto) {
        // Fetch the project details
        $proyectoModel = new ProyectoModel();
        $proyecto = $proyectoModel->obtenerPorId($id_proyecto);

        if (!$proyecto) {
            die('Proyecto no encontrado.');
        }

        // Get client name
        $clienteNombre = 'Desconocido';
        try {
            $sqlCliente = "SELECT nombre_empresa FROM Clientes WHERE id_cliente = :id_cliente";
            $psCliente = $this->db->prepare($sqlCliente);
            $psCliente->bindValue(':id_cliente', $proyecto->getId_cliente(), PDO::PARAM_INT);
            $psCliente->execute();
            $clienteNombre = $psCliente->fetchColumn() ?: 'Desconocido';
        } catch (PDOException $e) {
            error_log("Error al obtener nombre de cliente: " . $e->getMessage());
        }

        ob_clean();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Ficha de Proyecto'), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'ID Proyecto:', 0);
        $pdf->Cell(0, 10, $proyecto->getId_proyecto(), 0, 1);
        $pdf->Cell(50, 10, 'Cliente:', 0);
        $pdf->Cell(0, 10, utf8_decode($clienteNombre), 0, 1);
        $pdf->Cell(50, 10, 'Nombre Proyecto:', 0);
        $pdf->Cell(0, 10, utf8_decode($proyecto->getNombre_proyecto()), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Descripción:'), 0);
        $pdf->Cell(0, 10, utf8_decode($proyecto->getDescripcion()), 0, 1);
        $pdf->Cell(50, 10, 'Fecha Inicio:', 0);
        $pdf->Cell(0, 10, $proyecto->getFecha_inicio(), 0, 1);
        $pdf->Cell(50, 10, 'Fecha Fin:', 0);
        $pdf->Cell(0, 10, $proyecto->getFecha_fin(), 0, 1);
        $pdf->Cell(50, 10, 'Estado:', 0);
        $pdf->Cell(0, 10, utf8_decode($proyecto->getEstado()), 0, 1);
        $pdf->Cell(50, 10, utf8_decode('Fecha Creación:'), 0);
        $pdf->Cell(0, 10, $proyecto->getFecha_creacion(), 0, 1);
        $pdf->Output('D', 'Proyecto_' . $id_proyecto . '.pdf');
    }
}
?>