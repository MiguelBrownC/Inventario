<?php
include_once "encabezado.php";

$id = $_GET["id"];

$mysqli = include_once "conexion.php";

$sentencia = $mysqli->prepare("select * from colaborador c
inner join asignacion a 
    on c.id_colaborador = a.id_colaborador
inner join equipo e 
    on e.id_equipo = a.id_equipo
inner join tipo_equipo te 
    on te.id_tipo_equipo = e.id_tipo_equipo
inner join marca_equipo ma 
    on e.id_marca = ma.id_marca_equipo
inner join modelo_equipo me 
    on e.id_modelo = me.id_modelo_equipo
where c.id_colaborador = ?");

$sentencia->bind_param("i", $id);

$sentencia->execute();

$resultado = $sentencia->get_result();




$equipos = $resultado->fetch_all(MYSQLI_ASSOC);
if (!$equipos) {
    exit("No hay resultados para esta acta");
}




$sentencia2 = $mysqli->prepare("select * from colaborador WHERE id_colaborador = ?");

$sentencia2->bind_param("i", $id);

$sentencia2->execute();

$resultado2 = $sentencia2->get_result();


$col = $resultado2->fetch_assoc();
if (!$col) {
    exit("No hay resultados para este colaborador");
}


$sentencia3 = $mysqli->prepare("select sum(e.valor_equipo) as suma from colaborador c
inner join asignacion a 
    on c.id_colaborador = a.id_colaborador
inner join equipo e 
    on e.id_equipo = a.id_equipo
inner join tipo_equipo te 
    on te.id_tipo_equipo = e.id_tipo_equipo
inner join marca_equipo ma 
    on e.id_marca = ma.id_marca_equipo
inner join modelo_equipo me 
    on e.id_modelo = me.id_modelo_equipo
where c.id_colaborador = ?");

$sentencia3->bind_param("i", $id);

$sentencia3->execute();

$resultado3 = $sentencia3->get_result();

$suma = $resultado3->fetch_assoc();
if (!$suma) {
    exit("No hay resultados");
}

?>



<div class="row">
    <div class="col-12">
       <h3 style="color:Navy;">Detalle entrega Equipamiento tecnol&oacute;gico</h3>
    </div>
    <div class="col-12">

        <table class="table table-striped table-condensed">
                
                <tr>
                    <th>Nombre colaborador:</th>
                 

                    <td> <input type="text" readonly class="form-control-plaintext"  value="<?php echo $col['nombre_colaborador']." ".$col['apellido_pat_colaborador']." ".$col['apellido_mat_colaborador']; ?>">
                        <input type="hidden" id="colaborador" name="colaborador" value="<?php echo $col['id_colaborador']; ?>">                    </td>
    
                </tr>
               
               
                
            </table>

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
                        <td><?php echo "$ ".$equipo["valor_equipo"] ?></td>
                        <td>
                          
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <table class="table table-striped table-condensed">
                
                <tr>
                    <th>Valor total equipamiento:</th>
                 

                    <td> <input type="text" readonly class="form-control-plaintext"  value="<?php echo "$ ".$suma['suma']; ?>"></td>
    
                </tr>
               
               
                
            </table>
    </div>

    <div class="form-group">
                <button onclick="equipoasignado()"; class="btn btn-success">Aceptar asignaci&oacute;n</button>
                <a class="btn btn-warning" href="usuarios.php">Volver</a>
            </div>
</div>
