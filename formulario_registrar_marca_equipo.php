<?php include_once "encabezado.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Registrar marca equipo</h1>



        <form action="registrar_marca_equipo.php" method="POST">
            <div class="form-group">
                <label for="tipo">Marca equipo</label>

                  
                <input placeholder="Marca equipo" class="form-control" type="text" name="marca" id="marca" required>


            </div>

       
            <div class="form-group"><button class="btn btn-success">Guardar</button></div>
        </form>




    </div>
</div>
