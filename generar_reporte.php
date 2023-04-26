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
		$arquivo = 'Reporte Inventario '.$dh.'.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';

		$html .= '<tr>';
		$html .= '<td><b>Tipo de Empresa</b></td>';
		$html .= '<td><b>Rut Colaborador</b></td>';
		$html .= '<td><b>Nombre Colaborador</b></td>';
		$html .= '<td><b>Tipo de Equipo</b></td>';
		$html .= '<td><b>Serial del Equipo</b></td>';
        $html .= '<td><b>Marca del Equipo</b></td>';
        $html .= '<td><b>Valor del Equipo</b></td>';
        $html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
        $sql = "select te.tipo_empresa, c.rut_colaborador, concat_ws(' ', c.nombre_colaborador, c.apellido_pat_colaborador, apellido_mat_colaborador)as 'name_colaborador', 
            teq.tipo_equipo , e.serial_equipo, me.marca_equipo, e.valor_equipo
            from colaborador c
            inner join asignacion a
            on c.id_colaborador = a.id_colaborador 
            inner join equipo e
            on a.id_equipo = e.id_equipo 
            inner join tipo_empresa te 
            on te.id_tipo_empresa = c.id_empresa
            inner join marca_equipo me
            on me.id_marca_equipo = e.id_marca
            inner join tipo_equipo teq 
            on teq.id_tipo_equipo = e.id_tipo_equipo;";

        $result = $mysqli->query($sql);



		while ($row_msg_contatos = mysqli_fetch_assoc($result)) {
			$html .= '<tr>';
			$html .= '<td>' . $row_msg_contatos["tipo_empresa"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["rut_colaborador"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["name_colaborador"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["tipo_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["serial_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["marca_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["valor_equipo"] . '</td>';
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