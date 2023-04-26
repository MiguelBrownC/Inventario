<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fontawesome.com/v4/assets/font-awesome/css/font-awesome.min.css">
    <title>
        Sistema control inventario TI MDA
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

    <script src="script.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <center>
        <div class="form-group mt-7">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none "
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href=" usuarios.php ">
                    <img src="https://mdai.cl/wp-content/uploads/elementor/thumbs/logotipo-azul-1-pr1h26nbk2gxyzwobylo78hp8tibiij9rv5xefihz0.png"
                        alt="main_logo">
                    <span class="ms-1 font-weight-bold">Inventario TI</span>
                </a>
            </div>


            <form method="POST" action="access_login.php">
                <div class="form-group mt-7">
                    <label for="nombre">Usuario</label>
                    <input style="width:25%;" class="form-control" type="text" name="user" id="user" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Password</label>
                    <input style="width:25%;" class="form-control" type="password" name="pass" id="pass" required>
                </div>

                <div class="form-group">
                    <button name="btnaccess" class="btn btn-success">Acceder</button>
                    <a class="btn btn-warning" href="https://www.google.cl/">Salir</a>
                    <!-- llamar funcion de cerrar sesion en el boton -->
                </div>
            </form>
        </div>
    </center>

</body>

</html>