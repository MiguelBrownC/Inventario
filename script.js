function ShowSelected()
{
/* Para obtener el valor */
var col = document.getElementById("colaborador").value;
var eq = document.getElementById("eq").value;

alert(col);

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
            window.location.replace("usuarios.php");

             
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
            window.location.replace("devolucioln_equipos.php");

             
        });

        
}


function login()
{
/* Para obtener el valor */
var user = document.getElementById("user").value;//nombre
var pass = document.getElementById("pass").value;//pass
//idare

$.post("access_login.php", {//php coneccion access login
            user: user,
            pass: pass

        }, function (data, status) {
       		alert('Usuario Logueado');
    		windows.location.href="usuarios.php";
        });


}