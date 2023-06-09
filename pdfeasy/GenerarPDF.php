<?php	

$id = $_GET["id"];

$mysqli = include_once "../conexion.php";

$nombreImagen = "logo.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));

$sentencia = $mysqli->prepare("select * from colaborador c
inner join asignacion a 
    on c.id_colaborador = a.id_colaborador
inner join equipo e 
    on e.id_equipo = a.id_equipo
inner join tipo_equipo te 
    on te.id_tipo_equipo = e.id_tipo_equipo
inner join marca_equipo ma 
    on e.id_marca = ma.id_marca_equipo
inner join modelo_equipo me 
    on e.id_modelo = me.id_modelo_equipo
where c.id_colaborador = ?");



$sentencia->bind_param("i", $id);

$sentencia->execute();

$resultado = $sentencia->get_result();




$equipos = $resultado->fetch_all(MYSQLI_ASSOC);
if (!$equipos) {
    exit("No hay resultados para esta acta");
}


$mihtml  = ' <table class"table table-striped>"';
	$mihtml .= '<thead>';
	$mihtml .= '<tr id="columnita">';
	$mihtml .= '<th>SERIAL</th>';
	$mihtml .= '<th>TIPO EQUIPO</th>';
	$mihtml .= '<th>MARCA EQUIPO</th>';
	$mihtml .= '<th>MODELO EQUIPO</th>';
	$mihtml .= '<th>PROCESADOR</th>';
	$mihtml .= '<th>HDD</th>';
	$mihtml .= '<th>RAM</th>';
	$mihtml .= '<th>VALOR EQUIPO</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';

	
	
	foreach ($equipos as $equipo) { 
		$mihtml .= '<tr><td>'.$equipo['serial_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['tipo_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['marca_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['modelo_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['procesador_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['capacidad_hdd_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['ram_equipo'] . "</td>";
		$mihtml .= '<td>'.$equipo['valor_equipo'] . "</td></tr>";	
	}
	
	$mihtml .= '</tbody>';
	$mihtml .= '</table';



$sentencia2 = $mysqli->prepare("select * from colaborador WHERE id_colaborador = ?");

$sentencia2->bind_param("i", $id);

$sentencia2->execute();

$resultado2 = $sentencia2->get_result();


$col = $resultado2->fetch_assoc();
if (!$col) {
    exit("No hay resultados para este colaborador");
}

$sentencia3 = $mysqli->prepare("select sum(e.valor_equipo) as suma from colaborador c
inner join asignacion a 
    on c.id_colaborador = a.id_colaborador
inner join equipo e 
    on e.id_equipo = a.id_equipo
inner join tipo_equipo te 
    on te.id_tipo_equipo = e.id_tipo_equipo
inner join marca_equipo ma 
    on e.id_marca = ma.id_marca_equipo
inner join modelo_equipo me 
    on e.id_modelo = me.id_modelo_equipo
where c.id_colaborador = ?");

$sentencia3->bind_param("i", $id);

$sentencia3->execute();

$resultado3 = $sentencia3->get_result();

$suma = $resultado3->fetch_assoc();
if (!$suma) {
    exit("No hay resultados");
}

//inicio datos de clolaborador y equipos 
$fechas = date("d/m/Y");

$nombre =  $col['nombre_colaborador']." ".$col['apellido_pat_colaborador']." ".$col['apellido_mat_colaborador']; 
$rut = $col['rut_colaborador'];
$email = $col['mail_colaborador'];
$celular = $col['celular_mda_colaborador'];
$valor_total = $suma["suma"];

//fin datos de clolaborador y equipos 
	
	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	$dompdf->set_base_path("bootstrap.min.css");
	
	// Cargar el HTML
	$dompdf->load_html('<style type="text/css">

table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.class-theme{
	background:#4cc2c5;
	padding: 5px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 5px;
}
#columnita
{
	background-color: #C5C6CC;
}
.clouds{
	background:#ecf0f1;
	padding: 5px;
}
.border-top{
	border-top: solid 2px #eee;
	
}
.border-left{
	border-left: solid 2px #eee;
}
.border-right{
	border-right: solid 2px #eee;
}
.border-bottom{
	border-bottom: solid 2px #eee;
}

table.page_header{
	width: 100%;
	padding:0px;
	background-color:#ffffff;

}

table.page_footer{
	width: 100%;
	padding:0px;
	
}
.border-bottom{
	border-bottom: #4cc2c5 3px;
	padding-bottom:10px
}
.orange-top{
	border-top: #4cc2c5 3px;
}
.orange-left{
	border-left: #4cc2c5 3px;
}
.white{
	border-bottom:white 3px;
}
table{
	color:#2c3e50;
}
 .inpar{
	 background-color: #f0eeed;
 }

</style><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><table class="page_header" cellspacing=0 cellpadding=0 style="width:80%">
     

			<tr>

                
				<td>
                   <img style="width: 20%;" src="'.$imagenBase64.'" alt="Logo">

                </td>
				
				<td>
					<p style="font-size: 1.2rem;" class="text-center mb-0"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asignaci&oacute;n de Activo Fijo</b></p>
                </td>
               
            </tr>
        </table>   <hr>


 
  <div>
   <p class="text-left"><b>ACUERDO CON EL USUARIO</b></p>



<p class="text-sm-left">Al firmar este acuerdo usted acepta cumplir todos los términos establecidos en el mismo y en particular seguir los siguientes parámetros: </p>
<p class="text-md-left">No alterar las configuraciones internas del sistema de los dispositivos asignados.</p>
<p class="text-lg-left">No almacenar archivos o imágenes relacionados al trabajo en servicios de almacenamiento en la nube no autorizados.</p>
<p class="text-xl-left">Su pérdida o deterioro será sancionado y se descontara cualquier pago que realice la empresa, conforme lo dispone el artículo 58, inciso 2° del código del trabajo.</p>
<br>
  </div><hr>

	
	<p style="color:#233f9a;margin-top:-10px">Fecha acta entrega:'.$fechas.'</p><p>
		<span style="color:#233f9a;font-size:20px;font-weight:bold">Colaborador:</span><br>
		<span style="font-size:15px;color:#233f9a;"><strong>Nombre: </strong>'.$nombre.'<br>
			<strong>RUT: </strong>'.$rut.'
			<strong> | E-mail: </strong>'.$email.'
			<strong> | Teléfono: </strong>'.$celular.'
		</span>
	</p><hr>'.$mihtml.'<hr><br><div>
   <p class="text-left"><b>ASIMISMO, RECONOZCO Y ACEPTO QUE: </b></p>
<p class="text-md-left">Recibo un equipo para el cumplimiento de las actividades laborales.</p>
<p class="text-lg-left">He leído y comprendido el acuerdo de uso del dispositivo asignado.</p>
<p class="text-xl-left">Declaro la recepción de éste en buen estado y se compromete a cuidar y mantener en óptimas condiciones los recursos y hacer uso de ellos para los fines establecidos.</p>
<p class="text-md-left">Notificare a la empresa si el dispositivo se extravía o es robado lo antes posible.</p>
<p class="text-md-left">Al momento de regresar el equipo, este debe incluir sus accesorios.</p>
<br>
  </div>
	');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"acta_entrega_activos_TI_".$nombre, 
		array(
			"Attachment" => false //Para realizar la descarga
		)
	);
?>