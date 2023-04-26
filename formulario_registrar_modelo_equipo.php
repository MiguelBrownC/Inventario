<?php include_once "encabezado.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Registrar modelo equipo</h1>



        <form action="registrar_modelo_equipo.php" method="POST">
            <div class="form-group">
                <label for="tipo">Modelo equipo</label>

                  
                <input placeholder="Modelo equipo" class="form-control" type="text" name="modelo" id="modelo" required>


            </div>

       
            <div class="form-group"><button class="btn btn-success">Guardar</button></div>
        </form>




    </div>
</div>
