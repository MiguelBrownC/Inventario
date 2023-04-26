
<?php

// incorporamos el archivo de conexion a mysql, y almacenamos el retorno en una variable
$mysqli = include_once "conexion.php";


// recibimos los valores enviados por post desde el formulario de registro de juego 
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

$nombrepadre = "juanito";


//genera el proceso de insercion de los dato en la tabla correspondiente dentro de la bbdd
$query = $mysqli->prepare("INSERT INTO videojuegos
(nombre, descripcion)
VALUES
(?, ?)");
// insert into videjuego (nombre, descripcion) values()

//proceso de agregar los datos a la query de insercion
$query->bind_param("ss", $nombre, $descripcion);
// insert into videjuego (nombre, descripcion) values('juego test,'es un juego de prueba') 

/*
  ejecutamos la query a la base de dato, para que se puedan insertar 
  estos datos en la tabla correspondiente
*/
$query->execute();


//genera el proceso de insercion de los dato en la tabla correspondiente dentro de la bbdd
$query2 = $mysqli->prepare("INSERT INTO padre
(nombre_padre)
VALUES
(?)");
// insert into videjuego (nombre, descripcion) values()

//proceso de agregar los datos a la query de insercion
$query2->bind_param("s", $nombrepadre);
// insert into videjuego (nombre, descripcion) values('juego test,'es un juego de prueba') 

/*
  ejecutamos la query a la base de dato, para que se puedan insertar 
  estos datos en la tabla correspondiente
*/
$query2->execute();



//este metodo permite redireccionar a la url que indique
header("Location: listar.php");