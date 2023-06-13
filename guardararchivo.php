<?php
// Verificar si se envió un archivo
if(isset($_FILES['archivoPDF'])) {
  // Obtener información del archivo
  $nombreArchivo = $_FILES['archivoPDF']['name'];
  $ubicacionArchivo = $_FILES['archivoPDF']['tmp_name'];
  $serial_equipo = $_GET['serial_equipo']; // falta obtener la serial del equipo desde equipamiento.php

  // Mover el archivo al directorio deseado en el servidor
  $directorioDestino = './docs/bills/'; 
  $rutaArchivo = $directorioDestino . $nombreArchivo;
  
  if(move_uploaded_file($ubicacionArchivo, $rutaArchivo)) {
    
    // El archivo se ha subido correctamente
    $mysqli = include_once "conexion.php"; 
    $rutaArchivo = mysqli_real_escape_string($mysqli, $rutaArchivo); 

    $query = "UPDATE `wwtimd_inventario_mda`.`equipo` SET `ruta_factura` = '$rutaArchivo' WHERE `serial_equipo` = '$serial_equipo'";
    echo $query;
    mysqli_query($mysqli, $query);
//falta un mensaje de aviso que se subio correctamente el archivo
    mysqli_close($mysqli);
    // header('location: equipamiento.php');
    // mensajeAviso();
    exit;
  } else {
    // Error al subir el archivo
    echo "Error al subir el archivo PDF.";
  }
}
