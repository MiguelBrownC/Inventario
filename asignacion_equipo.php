
<?php

date_default_timezone_set("America/Santiago");
$fecha = date("Y-m-d G:i:s");

$mysqli = include_once "conexion.php";


$col = $_POST["col"];
$eq = $_POST["eq"];
$estado = 1;
$estado_asig_col = 1;

$query = $mysqli->prepare("INSERT INTO asignacion
(id_colaborador,id_equipo)
VALUES
(?,?)");


$query->bind_param("ii",$col, $eq);
$query->execute();


$query2 = $mysqli->prepare("INSERT INTO log_asignacion
(id_colaborador,id_equipo,fecha_asignacion)
VALUES
(?,?,?)");


$query2->bind_param("iis",$col, $eq,$fecha);
$query2->execute();


$sentencia = $mysqli->prepare("UPDATE equipo SET
status_asignacion = ?

WHERE id_equipo = ?");

$sentencia->bind_param("ii",$estado,$eq);

$sentencia->execute();



$sentencia2 = $mysqli->prepare("UPDATE colaborador SET
equipo_colaborador = ?

WHERE id_colaborador = ?");

$sentencia2->bind_param("ii",$estado,$col);

$sentencia2->execute();


header("Location: asignacion.php");

 header( "refresh:1; url=asignacion.php" ); 
?>
