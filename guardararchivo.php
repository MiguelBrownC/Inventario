<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha enviado el formulario por método POST

    // Obtener los archivos enviados
    $archivos = $_FILES['archivoPDF'];

    // Obtener el texto enviado
    $serial = $_POST['text'];

    // Verificar si se recibieron archivos
    if (!empty($archivos['name'])) {
        // Recorrer los archivos
        for ($i = 0; $i < count($archivos['name']); $i++) {
            $fileName = $archivos['name'][$i];
            $fileTmpName = $archivos['tmp_name'][$i];
            $fileSize = $archivos['size'][$i];
            $fileError = $archivos['error'][$i];

            // Verificar si se subió correctamente el archivo actual
            if ($fileError[$i] === UPLOAD_ERR_OK) {
                // Obtener el directorio de destino y la ruta del archivo
                $directorioDestino = './docs/bills/'; 
                $rutaArchivo = $directorioDestino . $fileName;

                // Mover el archivo a la ubicación final
                if (move_uploaded_file($fileTmpName[$i], $rutaArchivo)) {
                    // El archivo se ha subido correctamente
                    require_once "conexion.php"; 

                    // Escapar caracteres especiales en la ruta del archivo
                    $rutaArchivo = mysqli_real_escape_string($mysqli, $rutaArchivo); 

                    $query = "UPDATE `wwtimd_inventario_mda`.`equipo` SET `ruta_factura` = '$rutaArchivo' WHERE `serial_equipo` = '$serial'"; 
                    if (mysqli_query($mysqli, $query)) {
                        // La actualización se realizó correctamente
                        // Puedes agregar un mensaje de éxito aquí si lo deseas
                        mysqli_close($mysqli);
                    } else {
                        // Error al ejecutar la consulta de actualización
                        echo "Error al actualizar la base de datos: " . mysqli_error($mysqli);
                    }
                } else {
                    // Error al mover el archivo
                    echo "Error al subir el archivo $fileName.";
                }
            } else {
                // Error en la carga del archivo
                echo "Error al cargar el archivo $fileName. Código de error: $fileError[$i]";
            }
        }

        // Redireccionar después de procesar todos los archivos
        header('Location: equipamiento.php');
        exit;
    } else {
        echo 'No se han enviado archivos.';
    }
}
?>
