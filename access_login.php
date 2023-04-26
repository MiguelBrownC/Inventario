<?php
session_start();
include_once "conexion.php";
if(!empty($_POST["user"])AND $_POST["pass"]){
    $usuario=$_POST["user"];
    $password=$_POST["pass"];
    $datos=$mysqli->query("select * from users where username='$usuario' and password = '$password'");
    if ($datosobtenidos=$datos -> fetch_object()) {
        
        $_SESSION["name"]=$datosobtenidos->username;
        $_SESSION["id_area"]=$datosobtenidos->id_area;

        if($_SESSION["id_area"]==3){
            header("location: equipamiento.php");
        }else{
        // echo($_SESSION["name"]);
        // echo($_SESSION["id_area"]);
        header("location: usuarios.php");
        // echo"funca";
        }
    } else {
        header("location: index.php");
    }
}
?>