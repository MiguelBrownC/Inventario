<?php include_once "encabezado.php"; 
include_once "conexion.php";
$option_del_select = "";
$sql_tipo = "select * from tipo_equipo";

$option_del_select_brand = "";
$sql_marca = "select * from marca_equipo";

$option_del_select_model = "";
$sql_modelo = "select * from modelo_equipo";

//Obtencion de tipo del equipo
if($result = mysqli_query($mysqli, $sql_tipo)){
    $cont_types = mysqli_num_rows($result);
    if($cont_types>0){
        while($listtypes = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $listtypes['id_tipo_equipo'];
            $type_equipment = $listtypes['tipo_equipo'];
            $option_del_select.="<option value=\"$id\">$type_equipment</option>";

        }
    }else{
    $option_del_select.="<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
}else{
    $option_del_select.="<option value=\"0\">No se obtuvieron datos</option>";
}

//Obtencion de la marca del equipo
if($result_marca = mysqli_query($mysqli, $sql_marca)){
    $cont_brand = mysqli_num_rows($result_marca);
    if($cont_brand>0){
        while($list_brand = mysqli_fetch_array($result_marca, MYSQLI_ASSOC)){
            $id_marca = $list_brand['id_marca_equipo'];
            $brand_equipment = $list_brand['marca_equipo'];
            $option_del_select_brand.="<option value=\"$id_marca\">$brand_equipment</option>";

        }
    }else{
    $option_del_select_brand.="<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
}else{
    $option_del_select_brand.="<option value=\"0\">No se obtuvieron datos</option>";
}

//Obtencion del modelo del equipo
if($result_modelo = mysqli_query($mysqli, $sql_modelo)){
    $cont_model = mysqli_num_rows($result_modelo);
    if($cont_model>0){
        while($list_model = mysqli_fetch_array($result_modelo, MYSQLI_ASSOC)){
            $id_modelo = $list_model['id_modelo_equipo'];
            $model_equipment = $list_model['modelo_equipo'];
            $option_del_select_model.="<option value=\"$id_modelo\">$model_equipment</option>";

        }
    }else{
    $option_del_select_model.="<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
}else{
    $option_del_select_model.="<option value=\"0\">No se obtuvieron datos</option>";
}
?>


<div class="row">
    <div class="col-12">
        <h2>Registrar Nuevo Equipo</h2>

        <form action="registrar_equipo_nuevo.php" method="POST">
            <div class="form-group">
                <label for="nombre">Serial</label>

                <input placeholder="SERIAL" class="form-control" type="text" name="serial_equipo" id="serial_equipo" required>
            </div>
            <div class="form-group">

                <label for="nombre">Tipo de Equipo</label>
                <select name="id_tipo_equipo">
                    <?php echo $option_del_select;
                    ?>
                </select>
            </div>

            <div class="form-group">

            <label for="nombre">Marca de Equipo</label>
                <select name="id_marca">
                    <?php echo $option_del_select_brand;
                    ?>
                </select>
            </div>

            <div class="form-group">

            <label for="nombre">Modelo de Equipo</label>
                <select name="id_modelo">
                    <?php echo $option_del_select_model;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Valor Equipo</label>

                <input placeholder="Valor Equipo" class="form-control" type="number" name="valor_equipo" id="valor_equipo" required>

            <div class="form-group">
                <label for="nombre">Fecha Compra Equipo</label>
                
                <input placeholder="dd/mm/aaaa" class="form-control" type="text" name="fecha_compra_equipo" id="fecha_compra_equipo">

            </div>

            <div class="form-group">
                <label for="nombre">Procesador Equipo</label>
                
                <input placeholder="Procesador Equipo" class="form-control" type="text" name="procesador_equipo" id="procesador_equipo">

            </div>

            <div class="form-group">
                <label for="nombre">RAM</label>

                <input placeholder="RAM" class="form-control" type="text" name="ram_equipo" id="ram_equipo">

            </div>
            <div class="form-group">
                <label for="nombre">Tipo de Almacenamiento</label>

                <input placeholder="Tipo de Disco" class="form-control" type="text" name="tipo_hdd_equipo" id="tipo_hdd_equipo">

            <div class="form-group">
                <label for="nombre">Capacidad de Almacenamiento</label>

                <input placeholder="Capacidad del Disco" class="form-control" type="text" name="capacidad_hdd_equipo" id="capacidad_hdd_equipo">

            </div>

            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
            <a class="btn btn-warning" href="equipamiento.php">Volver</a>
        </div>
            
        </form>

    </div>
</div>