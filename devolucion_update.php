
<?php

date_default_timezone_set("America/Santiago");
$fecha = date("Y-m-d G:i:s");

$mysqli = include_once "conexion.php";


$col = $_POST["col"];
$eq = $_POST["eq"];




$estado_dev_col = 1;
$status_asignacion = 0;


//actulizamos el campo de devolucion colaborador 
$sentencia = $mysqli->prepare("UPDATE colaborador SET
equipo_devolucioln = ? WHERE id_colaborador = ?");
$sentencia->bind_param("ii",$estado_dev_col,$col);
$sentencia->execute();


//validamos si existe algun otro equipo asignado, de no ser asi,
//actualizamos el campo equipo_colaborador a 0 en colaborador*/


$sentencia2 = $mysqli->prepare("SELECT COUNT(*) FROM asignacion WHERE id_colaborador = ?");
$sentencia2->bind_param("i", $col);
$sentencia2->execute();
$sentencia2->bind_result($count);
$sentencia2->fetch();
$total_asignado =  $count;


$sentencia2->free_result();


  $sentencia3 = $mysqli->prepare("UPDATE colaborador SET
equipo_colaborador = ? WHERE id_colaborador = ?");
$sentencia3->bind_param("ii",$status_asignacion ,$col);
$sentencia3->execute();




// eliminamos el registro de asignacion del equipo
$query="DELETE FROM asignacion WHERE id_equipo = ?";
$stmt = $mysqli->prepare($query);
if ($stmt) {
$stmt->bind_param('i',$eq);
$stmt->execute();

}

//actualizamos el campo status_asignacion de equipo para liberar el stock
$sentencia5 = $mysqli->prepare("UPDATE equipo SET
status_asignacion = ? WHERE id_equipo = ?");
$sentencia5->bind_param("ii",$status_asignacion,$eq);
$sentencia5->execute();

// actualizamos la fecha de devolucion equipo en log_asignacion
$sentencia6 = $mysqli->prepare("UPDATE log_asignacion SET
fecha_devolucion = ? WHERE id_equipo = ?");
$sentencia6->bind_param("si",$fecha,$eq);
$sentencia6->execute();

?>
