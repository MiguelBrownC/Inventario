
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema control activos TI MDA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
function ShowSelected()
{
/* Para obtener el valor */
var col = document.getElementById("colaborador").value;
var eq = document.getElementById("eq").value;



 $.post("asignacion_equipo.php", {
            col: col,
            eq: eq

        }, function (data, status) {
    
    
    		alert('Asignación realizada correctamente');

    		 location.reload();
    

  
        });


}


function equipoasignado()
{
/* Para obtener el valor */
var col = document.getElementById("colaborador").value;

$.post("asignacion_update.php", {
            col: col,

        }, function (data, status) {
    
            alert('Aceptación de asignación realizada correctamente');
            window.location.replace("listar.php");

             
        });

        
}

function equipodevuelto(eq,col)
{
/* Para obtener el valor */
var col = col;
var eq = eq;


$.post("devolucion_update.php", {
            col: col,
            eq:eq

        }, function (data, status) {
    
            alert('Devolución de equipo realizada correctamente');
            window.location.replace("usuarios.php");

             
        });

        
}


</script>
</head>

<body>
    <main class="container-fluid">