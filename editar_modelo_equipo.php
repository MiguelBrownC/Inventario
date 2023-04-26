
<?php
include_once "encabezado.php";

//generamos la conexion a bbdd
$mysqli = include_once "conexion.php";


$id = $_GET["id"];


$sentencia = $mysqli->prepare("select * from modelo_equipo WHERE id_modelo_equipo = ?");

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
        <h1>Actualizar Datos modelo equipo</h1>

        <form action="actualizar_modelo_equipo.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $equipo["id_modelo_equipo"] ?>">

             <div class="form-group">
                <label for="nombre">MODELO EQUIPO</label>


                <input value="<?php echo $equipo["modelo_equipo"] ?>" placeholder="Modelo equipo" class="form-control" type="text" name="modelo" id="modelo" required>



            </div>


      
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="mantenedor.php">Volver</a>
            </div>

        </form>
    </div>
</div>