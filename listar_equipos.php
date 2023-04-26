<?php
include_once "encabezado.php";

$mysqli = include_once "conexion.php";
$resultado = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 order by e.fecha_compra_equipo desc");

$equipos = $resultado->fetch_all(MYSQLI_ASSOC);

?>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="css/logo.png" width="10%" height="10%">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="listar.php">Colaboradores</a>
      <a class="nav-item nav-link active" href="listar_equipos.php">Equipamiento</a>
      <a class="nav-item nav-link" href="asignacion.php">Asignaci&oacute;n equipo</a>
       <a class="nav-item nav-link" href="devolucion.php">Devoluci&oacute;n equipo</a>
      <a class="nav-item nav-link" href="mantenedor.php">Mantenedor</a>
    </div>
  </div>
</nav>

<div class="row">
    <div class="col-12">
       <h3 style="color:Navy;">Equipamiento tecnol&oacute;gico MDA</h3>
    </div>
    <div class="col-12">


        <a class="btn btn-success my-2" href="formulario_registrar.php">Agregar nuevo equipo</a>

<!-- inicio de tabla que muestra los datos de los video juegos almacenados en la bbdd-->
        <table class="table">
            <thead>
                <!-- cabecera -->
                <tr>
                    <th>SERIAL</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>PROCESADOR</th>
                    <th>HDD</th>
                    <th>RAM</th>
                    <th>TIPO EQUIPO</th>
                    <th>VALOR EQUIPO</th>
                    <th>FECHA COMPRA</th>
                    <th>EDITAR</th>
                    <th>BAJA</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($equipos as $equipo) { ?>


                    <tr>

                        <td class="align-middle text-center text-sm">
                            <?php echo $equipo["serial_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["marca_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["modelo_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["procesador_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["capacidad_hdd_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["ram_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["tipo_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["valor_equipo"] ?></td>
                        <td class="align-middle text-center text-sm"><?php echo $equipo["fecha_compra_equipo"] ?></td>
                       
                        <td class="align-middle text-center text-sm">
                          
                            <a href="editer_equipo.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="eliminar_equipos.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
