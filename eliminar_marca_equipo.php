
<?php

$mysqli = include_once "conexion.php";

$id = $_GET["id"];
$estado = 0;


$sentencia = $mysqli->prepare("UPDATE marca_equipo SET
status_equipo = ?

WHERE id_marca_equipo = ?");

$sentencia->bind_param("ii",$estado, $id);

$sentencia->execute();

header("Location: mantenedores.php");
?>