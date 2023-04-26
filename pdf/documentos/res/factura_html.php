<style type="text/css">

table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.class-theme{
	background:#4cc2c5;
	padding: 5px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 5px;
}
.clouds{
	background:#ecf0f1;
	padding: 5px;
}
.border-top{
	border-top: solid 2px #eee;
	
}
.border-left{
	border-left: solid 2px #eee;
}
.border-right{
	border-right: solid 2px #eee;
}
.border-bottom{
	border-bottom: solid 2px #eee;
}

table.page_header{
	width: 100%;
	padding:0px;
	background-color:#ffffff;

}

table.page_footer{
	width: 100%;
	padding:0px;
	
}
.border-bottom{
	border-bottom: #4cc2c5 3px;
	padding-bottom:10px
}
.orange-top{
	border-top: #4cc2c5 3px;
}
.orange-left{
	border-left: #4cc2c5 3px;
}
.white{
	border-bottom:white 3px;
}
table{
	color:#2c3e50;
}
 .inpar{
	 background-color: #f0eeed;
 }

</style>

<link rel="stylesheet" href="bootstrap.min.css">



        <table class="page_header" cellspacing=0 cellpadding=0 style="width:80%">
     

			<tr>

                
				<td style="width:25%;padding-left:0mm">
                   <img style="width: 50%;" src="logo.png" alt="Logo">

                </td>
				
				<td>
					<br><br><br>
					<p style="font-size: 2rem;" class="text-center mb-0"><b>Asignaci&oacute;n de Activo Fijo</b></p>
                </td>
               
            </tr>
        </table>

        <hr>


 
  <div>
   <p class="text-left"><b>ACUERDO CON EL USUARIO</b></p>



<p class="text-sm-left">Al firmar este acuerdo usted acepta cumplir todos los términos establecidos en el mismo y en particular seguir los siguientes parámetros: <br></p>
<ul><p class="text-md-left">No alterar las configuraciones internas del sistema de los dispositivos asignados.</p></ul>
<ul><p class="text-lg-left">No almacenar archivos o imágenes relacionados al trabajo en servicios de almacenamiento en la nube no autorizados.</p></ul>
<ul><p class="text-xl-left">Su pérdida o deterioro será sancionado y se descontara cualquier pago que realice la empresa, conforme lo dispone el artículo 58, inciso 2° del código del trabajo.</p></ul>
<br>
  </div>

	
	<p style='color:#233f9a;margin-top:-10px'>Fecha acta entrega: <?php echo date("d/m/Y");?></p>
	
	<p>
		<span style='color:#233f9a;font-size:20px;font-weight:bold'>Colaborador:</span><br>
		<span style='font-size:15px;color:#233f9a;'><strong>Nombre: </strong> <?php echo $col['nombre_colaborador']." ".$col['apellido_pat_colaborador']." ".$col['apellido_mat_colaborador']; ?><br>
			<strong>RUT: </strong> <?php echo $col['rut_colaborador']; ?><br>
			<strong>E-mail: </strong> <?php echo $col['mail_colaborador']; ?><br>
			<strong>Teléfono: </strong> <?php echo $col['celular_mda_colaborador']; ?>
		</span>
	</p>
	
	
        <table class="table table-striped">
          <thead>
    <tr>

                 <th>
                   SERIAL
                </th>

				<th>
                   TIPO EQUIPO
                </th>
				<th>
                   MARCA EQUIPO
                </th>
				<th>
                   MODELO EQUIPO
                </th>
				<th>
                   PROCESADOR
                </th>
				<th>
                   HDD
                </th>

                <th>
                   RAM
                </th>

                <th>
                   VALOR EQUIPO
                </th>
               
            </tr>
             </thead>
            <tbody>

			  <?php foreach ($equipos as $equipo) { ?>
			<tr>
                        <td>jjjj</td>
                        <td>jjjj</td>
                        <td>jjj</td>
                        <td>jjj</td>
                        <td>jjj</td>
                        <td>jj</td>
                        <td>jj</td>
                        <td>jjj</td>  
			</tr>
			<?php } ?>
</tbody>
        </table>
		<br>
		   <table class="table table-striped table-condensed">
                
                <tr>
                    <th>Valor total equipamiento:</th>
                 

                    <td><input type='text' readonly class='form-control-plaintext'  value='hhhhh'></td>
    
                </tr>
               
               
                
            </table>
		
		<div>
   <p class="text-left"><b>ASIMISMO, RECONOZCO Y ACEPTO QUE: </b></p>



<br>
<ul><p class="text-md-left">Recibo un equipo para el cumplimiento de las actividades laborales.</p></ul>
<ul><p class="text-lg-left">He leído y comprendido el acuerdo de uso del dispositivo asignado.</p></ul>
<ul><p class="text-xl-left">Declaro la recepción de éste en buen estado y se compromete a cuidar y mantener en óptimas condiciones los recursos y hacer uso de ellos para los fines establecidos.</p></ul>
<ul><p class="text-md-left">Notificare a la empresa si el dispositivo se extravía o es robado lo antes posible.</p></ul>
<ul><p class="text-md-left">Al momento de regresar el equipo, este debe incluir sus accesorios.</p></ul>
<br>
  </div>

  
