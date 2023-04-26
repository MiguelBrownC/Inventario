
<?php
include_once "encabezado.php";

//generamos la conexion a bbdd
$mysqli = include_once "conexion.php";


//capturamos el id del videojuego seleccionado enviado por metodo get
$id = $_GET["id"];

//preparamos la consulta select con where praa traer los datos del juego a editar
$sentencia = $mysqli->prepare("SELECT * FROM colaborador WHERE id_colaborador = ?");

$sentencia->bind_param("i", $id);

$sentencia->execute();

$resultado = $sentencia->get_result();

# Obtenemos solo una fila, que será el videojuego a editar
$colaborador = $resultado->fetch_assoc();
$space=" ";
if (!$colaborador) {
    exit("No hay resultados para este colaborador");
}

?>
<div class="row">
    <div class="col-12">
        <h1>Actualizar Datos de <?php echo $colaborador["nombre_colaborador"], $space, $colaborador["apellido_pat_colaborador"] ?></h1>

        <form action="actualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $colaborador["id_colaborador"] ?>">

             <div class="form-group">
                <label for="nombre">RUT</label>


                <input value="<?php echo $colaborador["rut_colaborador"] ?>" placeholder="RUT" class="form-control" type="text" name="rut" id="rut" required>



            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>


                <input value="<?php echo $colaborador["nombre_colaborador"] ?>" placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>



            </div>

             <div class="form-group">
                <label for="ap">Apellido Paterno</label>


                <input value="<?php echo $colaborador["apellido_pat_colaborador"] ?>" placeholder="Apellido paterno" class="form-control" type="text" name="ap" id="ap" required>



            </div>

             <div class="form-group">
                <label for="am">Apellido Materno</label>


                <input value="<?php echo $colaborador["apellido_mat_colaborador"] ?>" placeholder="Apellido Materno" class="form-control" type="text" name="am" id="am" required>



            </div>

             <div class="form-group">
                <label for="nombre">Email</label>


                <input value="<?php echo $colaborador["mail_colaborador"] ?>" placeholder="Email colaborador" class="form-control" type="text" name="mail" id="mail" required>



            </div>

             <div class="form-group">
                <label for="nombre">Celular MDA</label>


                <input value="<?php echo $colaborador["celular_mda_colaborador"] ?>" placeholder="Celular MDA" class="form-control" type="text" name="celular" id="celular" required>



            </div>
            <div class="form-group">
                <label for="nombre">Celular Personal</label>

                  
                <input value="<?php echo $colaborador["celular_per_colaborador"] ?>" placeholder="Celular Personal" class="form-control" type="text" name="celular_Personal" id="celular_Personal" required>


            </div>
            <div class="form-group">
                <label for="nombre">Dirección</label>

                  
                <input value="<?php echo $colaborador["direccion_colaborador"] ?>" placeholder="Direccion" class="form-control" type="text" name="direc" id="direc" required>


            </div>
      
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="usuarios.php">Volver</a>
            </div>

        </form>
    </div>
</div>
