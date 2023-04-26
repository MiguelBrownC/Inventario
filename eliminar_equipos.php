
<?php

$mysqli = include_once "conexion.php";

$id = $_GET["id"];
$estado = 0;


$sentencia = $mysqli->prepare("UPDATE equipo SET
status_equipo = ?

WHERE id_equipo = ?");

$sentencia->bind_param("ii",$estado, $id);

$sentencia->execute();

header("Location: listar_equipos.php");
?>