
<?php
include_once "encabezado.php";

//generamos la conexion a bbdd
$mysqli = include_once "conexion.php";


$id = $_GET["id"];


$sentencia = $mysqli->prepare("select * from tipo_equipo WHERE id_tipo_equipo = ?");

$sentencia->bind_param("i", $id);

$sentencia->execute();

$resultado = $sentencia->get_result();

$equipo = $resultado->fetch_assoc();
if (!$equipo) {
    exit("No hay resultados para este tipo equipo");
}

?>

<div class="row">
    <div class="col-12">
        <h1>Actualizar Datos tipo equipo</h1>

        <form action="actualizar_tipo_equipo.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $equipo["id_tipo_equipo"] ?>">

             <div class="form-group">
                <label for="nombre">TIPO EQUIPO</label>


                <input value="<?php echo $equipo["tipo_equipo"] ?>" placeholder="Tipo equipo" class="form-control" type="text" name="tipo" id="tipo" required>



            </div>


      
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="mantenedores.php">Volver</a>
            </div>

        </form>
    </div>
</div>