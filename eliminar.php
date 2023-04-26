
<?php

$mysqli = include_once "conexion.php";

$id = $_GET["id"];
$estado = 0;


$sentencia = $mysqli->prepare("UPDATE colaborador SET
estado_colaborador = ?

WHERE id_colaborador = ?");

$sentencia->bind_param("ii",$estado, $id);

$sentencia->execute();

header("Location: usuarios.php");
?>