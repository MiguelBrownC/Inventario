<?php	

	include_once("db.php");
	$mihtml = '<table border=1';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>ID</th>';
	$mihtml .= '<th>COD Transaccion</th>';
	$mihtml .= '<th>Nombres</th>';
	$mihtml .= '<th>Tipo de Pago</th>';
	$mihtml .= '<th>Estado Transaccion</th>';
	$mihtml .= '<th>E-mail</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$id = $_GET["id"];
	$resultado_transacciones = "SELECT * FROM colaborador WHERE id_colaborador=".$id;
	$resultado_transacciones = mysqli_query($conectar, $resultado_transacciones);
	while($transacciones = mysqli_fetch_assoc($resultado_transacciones)){
		$mihtml .= '<tr><td>'.$transacciones['id_colaborador'] . "</td>";
		$mihtml .= '<td>'.$transacciones['nombre_colaborador'] . "</td>";
		$mihtml .= '<td>'.$transacciones['rut_colaborador'] . "</td>";
		$mihtml .= '<td>'.$transacciones['mail_colaborador'] . "</td>";
		$mihtml .= '<td>'.$transacciones['celular_mda_colaborador'] . "</td>";
		$mihtml .= '<td>'.$transacciones['apellido_pat_colaborador'] . "</td></tr>";		
	}
	
	$mihtml .= '</tbody>';
	$mihtml .= '</table';

	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	
	// Cargar el HTML
	$dompdf->load_html('
        <table class="page_header" cellspacing=0 cellpadding=0 style="width:80%"><tr><td style="width:25%;padding-left:0mm"><img style="width: 50%;" src="https://mdai.cl/wp-content/uploads/elementor/thumbs/logotipo-blanco-pr1gu1dobrbhcnqnwfu2lahvwlnssy70njmfo3lbwc.png" alt="Logo"></td><td><br><br><br><p style="font-size: 2rem;" class="text-center mb-0"><b>Asignaci&oacute;n de Activo Fijo</b></p></td></tr></table>'. $mihtml .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Lista_Transacciones", 
		array(
			"Attachment" => true //Para realizar la descarga
		)
	);
?>