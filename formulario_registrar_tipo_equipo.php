<?php include_once "encabezado.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Registrar tipo equipo</h1>



        <form action="registro_tipo_equipo.php" method="POST">
            <div class="form-group">
                <label for="tipo">Tipo equipo</label>

                  
                <input placeholder="Tipo equipo" class="form-control" type="text" name="tipo" id="tipo" required>


            </div>

       
            <div class="form-group"><button class="btn btn-success">Guardar</button></div>
        </form>




    </div>
</div>
