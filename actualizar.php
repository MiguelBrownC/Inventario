
<?php
$mysqli = include_once "conexion.php";

$id = $_POST["id"];
$rut = $_POST["rut"];
$nombre = $_POST["nombre"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$mail = $_POST["mail"];
$celular = $_POST["celular"];

$descripcion = $_POST["descripcion"];

$sentencia = $mysqli->prepare("UPDATE colaborador SET
rut_colaborador = ?,
nombre_colaborador = ?,
apellido_pat_colaborador = ?,
apellido_mat_colaborador = ?,
mail_colaborador = ?,
celular_mda_colaborador = ?
WHERE id_colaborador = ?");

$sentencia->bind_param("ssssssi",$rut, $nombre, $ap, $am, $mail, $celular, $id);

$sentencia->execute();

header("Location: usuarios.php");
