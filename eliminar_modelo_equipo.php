
<?php

$mysqli = include_once "conexion.php";

$id = $_GET["id"];
$estado = 0;


$sentencia = $mysqli->prepare("UPDATE modelo_equipo SET
status_modelo = ?

WHERE id_modelo_equipo = ?");

$sentencia->bind_param("ii",$estado, $id);

$sentencia->execute();

header("Location: mantenedores.php");
?>