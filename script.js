function ShowSelected() {
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


function equipoasignado() {
    /* Para obtener el valor */
    var col = document.getElementById("colaborador").value;

    $.post("asignacion_update.php", {
        col: col,

    }, function (data, status) {

        alert('Aceptación de asignación realizada correctamente');
        window.location.replace("usuarios.php");


    });


}

function equipodevuelto(eq, col) {
    /* Para obtener el valor */
    var col = col;
    var eq = eq;

    $.post("devolucion_update.php", {
        col: col,
        eq: eq

    }, function (data, status) {

        alert('Devolución de equipo realizada correctamente');
        window.location.replace("devolucioln_equipos.php");


    });


}


function login() {
    /* Para obtener el valor */
    var user = document.getElementById("user").value;//nombre
    var pass = document.getElementById("pass").value;//pass
    //idare

    $.post("access_login.php", {//php coneccion access login
        user: user,
        pass: pass

    }, function (data, status) {
        alert('Usuario Logueado');
        windows.location.href = "usuarios.php";
    });


}

function enviardatos() {
    // Obtener el archivo seleccionado
    var fileInput = $('#file')[0];
    var files = fileInput.files;

    // Verificar si se seleccionó algún archivo
    if (files.length > 0) {
        // Crear un objeto FormData
        var formData = new FormData();

        // Agregar todos los archivos al FormData
        for (var i = 0; i < files.length; i++) {
            formData.append('archivoPDF[]', files[i]);
        }

        var serial = $('#serial').text();
        formData.append('text', serial);

        // Configurar la solicitud AJAX
        $.ajax({
            url: 'guardararchivo.php', // Archivo PHP que procesará la carga de los archivos
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Se ejecuta cuando la carga de los archivos se completa correctamente
                console.log('Archivos subidos exitosamente:', response);
            },
            error: function () {
                // Se ejecuta si hay algún error en la carga de los archivos
                console.log('Error al subir los archivos.');
            }
        });
    } else {
        console.log('No se ha seleccionado ningún archivo.');
    }
}
