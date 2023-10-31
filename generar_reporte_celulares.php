<?php include_once "encabezado.php"; 
session_start();
include_once "conexion.php";

?>

<!DOCTYPE html>
<html lang="es-es">

<head>
    <meta charset="utf-8">
    <title>Contacto</title>

    <head>

    <body>
        <?php
        date_default_timezone_set('America/Santiago');
        $date = date('d-m-Y');
        $hour = date('H:i');
        $dh = $date.' '.$hour;
        
		// Definimos el archivo exportado
		$arquivo = 'Reporte Inventario Celuares '.$dh.'.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';

		$html .= '<tr>';
        $html .= '<td><b>Rut</b></td>';
        $html .= '<td><b>Nombre</b></td>';
		$html .= '<td><b>Serial Equipo</b></td>';
		$html .= '<td><b>Marca Equipo</b></td>';
		$html .= '<td><b>Modelo Equipo</b></td>';

        $html .= '<td><b>Valor Equipo</b></td>';
        $html .= '<td><b>Fecha de Compra</b></td>';
        $html .= '<td><b>Fecha ed Asignación</b></td>';
        $html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
        $sql = "
        SELECT
    col.rut_colaborador,
    CONCAT_WS(' ', col.nombre_colaborador, col.apellido_pat_colaborador) AS 'nombre_completo',
    e.serial_equipo,
    m.marca_equipo,
    mo.modelo_equipo,
    e.valor_equipo,
    e.fecha_compra_equipo,
    MAX(log.fecha_asignacion) AS 'fecha_asignacion'
FROM equipo e
INNER JOIN tipo_equipo te ON e.id_tipo_equipo = te.id_tipo_equipo
INNER JOIN marca_equipo m ON e.id_marca = m.id_marca_equipo
INNER JOIN modelo_equipo mo ON e.id_modelo = mo.id_modelo_equipo
INNER JOIN asignacion asi ON e.id_equipo = asi.id_equipo
INNER JOIN colaborador col ON asi.id_colaborador = col.id_colaborador
INNER JOIN log_asignacion log ON col.id_colaborador = log.id_colaborador
WHERE e.status_equipo = 1 AND e.id_tipo_equipo = 5
GROUP BY col.rut_colaborador, col.nombre_colaborador, col.apellido_pat_colaborador, e.serial_equipo, m.marca_equipo, mo.modelo_equipo, e.procesador_equipo, e.capacidad_hdd_equipo, e.ram_equipo, e.valor_equipo, e.fecha_compra_equipo order by col.nombre_colaborador asc ;
        ";

        $result = $mysqli->query($sql);



		while ($row_msg_contatos = mysqli_fetch_assoc($result)) {
			$html .= '<tr>';
            $html .= '<td>' . $row_msg_contatos["rut_colaborador"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["nombre_completo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["serial_equipo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["marca_equipo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["modelo_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["valor_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fecha_compra_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fecha_asignacion"] . '</td>';
            $html .= '</tr>';;
		}

        // Configuración en la cabecera
		header("Last-Modified: " . gmdate("D,d M Y") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
		header("Content-Description: PHP Generado Data");
		// Envia contenido al archivo
		echo $html;
		exit; ?>
    </body>

</html>