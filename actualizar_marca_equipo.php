<?php
$mysqli = include_once "conexion.php";

$id = $_POST["id"];
$marca = $_POST["marca"];


$sentencia = $mysqli->prepare("UPDATE marca_equipo SET
marca_equipo = ?

WHERE id_marca_equipo = ?");

$sentencia->bind_param("si",$marca,$id);

$sentencia->execute();

header("Location: mantenedor.php");