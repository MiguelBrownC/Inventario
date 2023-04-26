<?php

// incorporamos el archivo de conexion a mysql, y almacenamos el retorno en una variable
$mysqli = include_once "conexion.php";


// recibimos los valores enviados por post desde el formulario de registro de juego 
$tipo_equipo = $_POST["tipo"];
$estado = 1;


//genera el proceso de insercion de los dato en la tabla correspondiente dentro de la bbdd
$query = $mysqli->prepare("INSERT INTO tipo_equipo
(tipo_equipo,status_tipo_equipo)
VALUES
(?, ?)");
// insert into videjuego (nombre, descripcion) values()

//proceso de agregar los datos a la query de insercion
$query->bind_param("si",$tipo_equipo,$estado);
// insert into videjuego (nombre, descripcion) values('juego test,'es un juego de prueba') 

/*
  ejecutamos la query a la base de dato, para que se puedan insertar 
  estos datos en la tabla correspondiente
*/
$query->execute();


//este metodo permite redireccionar a la url que indique
header("Location: mantenedores.php");
