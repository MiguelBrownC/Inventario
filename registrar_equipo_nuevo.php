
<?php

$mysqli = include_once "conexion.php";
 
$serial_equipo = $_POST["serial_equipo"];
$procesador_equipo = $_POST["procesador_equipo"];
$ram_equipo = $_POST["ram_equipo"];
$tipo_hdd_equipo = $_POST["tipo_hdd_equipo"];
$capacidad_hdd_equipo = $_POST["capacidad_hdd_equipo"];
$fecha_compra_equipo = $_POST["fecha_compra_equipo"];
$valor_equipo = $_POST["valor_equipo"];
$id_tipo_equipo = $_POST["id_tipo_equipo"];
$id_marca = $_POST["id_marca"];
$id_modelo = $_POST["id_modelo"];
$status_equipo = 1;
$status_asignacion = 0;

$query = $mysqli->prepare("INSERT INTO equipo(serial_equipo, procesador_equipo, ram_equipo, tipo_hdd_equipo, capacidad_hdd_equipo, fecha_compra_equipo, 
valor_equipo, id_tipo_equipo, id_marca, id_modelo, status_equipo, status_asignacion)
VALUES
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$query->bind_param("ssssssiiiiii",$serial_equipo, $procesador_equipo, $ram_equipo, $tipo_hdd_equipo, $capacidad_hdd_equipo, $fecha_compra_equipo, 
$valor_equipo, $id_tipo_equipo, $id_marca, $id_modelo, $status_equipo, $status_asignacion);
var_dump($query);
$query->execute();

header("Location: equipamiento.php");
