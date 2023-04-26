
<?php

$mysqli = include_once "conexion.php";

$id = $_GET["id"];
$estado = 0;


$sentencia = $mysqli->prepare("UPDATE tipo_equipo SET
status_tipo_equipo = ?

WHERE id_tipo_equipo = ?");

$sentencia->bind_param("ii",$estado, $id);

$sentencia->execute();

header("Location: mantenedores.php");
?>