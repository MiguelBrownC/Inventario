
<?php

//parametros de conexion a base de datos
	//indica la ruta o direccion del servidor
	$host = "localhost";
	//usuario de base de datos
$usuario = "inventario";
	//clave de usuario de base datos
$contrasenia = "123456";
	//nombre de la base de datos
$base_de_datos = "wwtimd_inventario_mda";


// instancia del objeto de conexion a la base de datos mediante mysqli
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
$mysqli -> set_charset("utf8");


if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else
{
	
	return $mysqli;
}

?>
