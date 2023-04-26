
<?php

date_default_timezone_set("America/Santiago");
$fecha = date("Y-m-d G:i:s");

$mysqli = include_once "conexion.php";


$col = $_POST["col"];

$estado_asig_col = 1;


$sentencia = $mysqli->prepare("UPDATE colaborador SET
equipo_entregado = ?

WHERE id_colaborador = ?");

$sentencia->bind_param("ii",$estado_asig_col,$col);

$sentencia->execute();

?>
