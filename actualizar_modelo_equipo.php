<?php
$mysqli = include_once "conexion.php";

$id = $_POST["id"];
$tipo = $_POST["modelo"];


$sentencia = $mysqli->prepare("UPDATE modelo_equipo SET
modelo_equipo = ?

WHERE id_modelo_equipo = ?");

$sentencia->bind_param("si",$tipo,$id);

$sentencia->execute();

header("Location: mantenedor.php");