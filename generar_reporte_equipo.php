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
		$arquivo = 'Reporte Inventario Equipamiento '.$dh.'.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';

		$html .= '<tr>';
		$html .= '<td><b>Serial Equipo</b></td>';
		$html .= '<td><b>Marca Equipo</b></td>';
		$html .= '<td><b>Modelo Equipo</b></td>';
		$html .= '<td><b>Procesador Equipo</b></td>';
		$html .= '<td><b>Capacidad Almacenamieto</b></td>';
        $html .= '<td><b>Ram</b></td>';
        $html .= '<td><b>Tipo de Equipo</b></td>';
        $html .= '<td><b>Valor Equipo</b></td>';
        $html .= '<td><b>Fecha de Compra</b></td>';
        $html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
        $sql = "select
            e.serial_equipo,
            m.marca_equipo,
            mo.modelo_equipo,
            e.procesador_equipo,
            e.capacidad_hdd_equipo,
            e.ram_equipo, te.tipo_equipo,
            e.valor_equipo,
            e.fecha_compra_equipo 
            from equipo e 
            inner join tipo_equipo te
            on e.id_tipo_equipo = te.id_tipo_equipo
            inner join marca_equipo m
            on e.id_marca = m.id_marca_equipo 
            inner join modelo_equipo mo
            on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1  order by e.fecha_compra_equipo desc;";

        $result = $mysqli->query($sql);



		while ($row_msg_contatos = mysqli_fetch_assoc($result)) {
			$html .= '<tr>';
			$html .= '<td>' . $row_msg_contatos["serial_equipo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["marca_equipo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["modelo_equipo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["procesador_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["capacidad_hdd_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["ram_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["tipo_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["valor_equipo"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fecha_compra_equipo"] . '</td>';
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