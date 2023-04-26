
<?php
$mysqli = include_once "conexion.php";

$id = $_POST["id"];
$tipo = $_POST["tipo"];


$sentencia = $mysqli->prepare("UPDATE tipo_equipo SET
tipo_equipo = ?

WHERE id_tipo_equipo = ?");

$sentencia->bind_param("si",$tipo,$id);

$sentencia->execute();

header("Location: mantenedor.php");
