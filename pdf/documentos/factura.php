
<?php

$id = $_GET["id"];

$mysqli = include_once "../../conexion.php";

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



	require_once(dirname(__FILE__).'/../html2pdf.class.php');

    
    include(dirname('__FILE__').'/res/factura_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF

  /* ...
   Resto del código que genera el PDF
     ... */
  /* Limpiamos la salida del búfer y lo desactivamos */
  ob_end_clean();
       $html2pdf->Output('acta_entrega_'.$col["nombre_colaborador"]."_".$col["apellido_pat_colaborador"]."_".$col["apellido_mat_colaborador"].'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
