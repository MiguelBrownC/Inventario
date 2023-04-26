<?php
// Configuración necesaria para acceder a la data base.
$hostname = "localhost:8889";
$usuariodb = "root";
$passworddb = "root";
$dbname = "inventario_mda";
	
// Generando la conexión con el servidor
$conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
?>