<?php
include_once "encabezado.php";

$id = $_GET["id"];
$estado = 1;

$mysqli = include_once "conexion.php";
$resultado = $mysqli->query("select * from asignacion a
inner join equipo e
on a.id_equipo = e.id_equipo
inner join colaborador c
on c.id_colaborador = a.id_colaborador
inner join marca_equipo me 
on me.id_marca_equipo = e.id_marca
inner join modelo_equipo mo 
on mo.id_modelo_equipo = e.id_modelo
inner join tipo_equipo te 
on te.id_tipo_equipo = e.id_tipo_equipo
where c.id_colaborador =".$id);

$equipos = $resultado->fetch_all(MYSQLI_ASSOC);


?>

<div class="row">
    <div class="col-12">
        <h1>Devoluci&oacute;n equipamiento colaborador MDA</h1>
    </div>
    <div class="col-12">

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
                    <th>DEVOLVER</th>
                  </tr>
            </thead>
            <tbody>

                <?php
                foreach ($equipos as $equipo) { ?>


                    <tr>
                        <td><?php echo $equipo["serial_equipo"] ?></td>
                        <td><?php echo $equipo["marca_equipo"] ?></td>
                        <td><?php echo $equipo["modelo_equipo"] ?></td>
                        <td><?php echo $equipo["procesador_equipo"] ?></td>
                        <td><?php echo $equipo["capacidad_hdd_equipo"] ?></td>
                        <td><?php echo $equipo["ram_equipo"] ?></td>
                        <td><?php echo $equipo["tipo_equipo"] ?></td>
                        <td><?php echo $equipo["valor_equipo"] ?></td>
                          <td>
                            <a href="#" class="btn btn-danger" onclick="equipodevuelto(<?php echo $equipo["id_equipo"].",".$equipo["id_colaborador"] ?>);" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>

                       
                   
                    </tr>
                <?php } ?>
            </tbody>
        </table>

             <div class="form-group">
                <a class="btn btn-warning" href="devoluciones.php">Volver</a>
            </div>
    </div>
</div>
