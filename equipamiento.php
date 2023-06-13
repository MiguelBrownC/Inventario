<?php
session_start();
$nombre = $_SESSION["name"];
$area = $_SESSION["id_area"];

if (isset($_SESSION["name"])) {
    include_once "encabezado.php";

    $mysqli = include_once "conexion.php";
    $resultado_note = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 1 order by e.fecha_compra_equipo desc");

    $equipos = $resultado_note->fetch_all(MYSQLI_ASSOC);

    $resultado_torre = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 2 order by e.fecha_compra_equipo desc");

    $torres = $resultado_torre->fetch_all(MYSQLI_ASSOC);


    $resultado_cel = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 5 order by e.fecha_compra_equipo desc");

    $celulares = $resultado_cel->fetch_all(MYSQLI_ASSOC);

    $resultado_bam = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 4 order by e.fecha_compra_equipo desc");

    $bams = $resultado_bam->fetch_all(MYSQLI_ASSOC);

    $resultado_print = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 3 order by e.fecha_compra_equipo desc");

    $prints = $resultado_print->fetch_all(MYSQLI_ASSOC);

    $resultado_screen = $mysqli->query("select
 e.id_equipo,
 e.serial_equipo,
 m.marca_equipo,
 mo.modelo_equipo,
 e.procesador_equipo,
 e.capacidad_hdd_equipo,
 e.ram_equipo, te.tipo_equipo,
 e.valor_equipo,
 e.fecha_compra_equipo 
 from equipo e 
 inner join tipo_equipo te
 on e.id_tipo_equipo = te.id_tipo_equipo
 inner join marca_equipo m
 on e.id_marca = m.id_marca_equipo 
 inner join modelo_equipo mo
 on e.id_modelo = mo.id_modelo_equipo where e.status_equipo = 1 and e.id_tipo_equipo = 6 order by e.fecha_compra_equipo desc");

    $screens = $resultado_screen->fetch_all(MYSQLI_ASSOC);


    $resultado_bajas = $mysqli->query(" select
    e.id_equipo,
    e.serial_equipo,
    m.marca_equipo,
    mo.modelo_equipo,
    e.procesador_equipo,
    e.capacidad_hdd_equipo,
    e.ram_equipo, te.tipo_equipo,
    e.valor_equipo,
    e.fecha_compra_equipo 
    from equipo e 
    inner join tipo_equipo te
    on e.id_tipo_equipo = te.id_tipo_equipo
    inner join marca_equipo m
    on e.id_marca = m.id_marca_equipo 
    inner join modelo_equipo mo
    on e.id_modelo = mo.id_modelo_equipo where e.equipo_baja = 1 order by e.fecha_compra_equipo desc");

    $bajas = $resultado_bajas->fetch_all(MYSQLI_ASSOC);

?>
    <!DOCTYPE html>
    <html lang="en">

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
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href=" usuarios.php ">
                    <img src="https://mdai.cl/wp-content/uploads/elementor/thumbs/logotipo-azul-1-pr1h26nbk2gxyzwobylo78hp8tibiij9rv5xefihz0.png" alt="main_logo">
                    <span class="ms-1 font-weight-bold">Inventario TI</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        if ($area == 1) {
                            echo <<< ASD
                    <a class="nav-link" href="usuarios.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Colaboradores / Actas</span>
                    </a>
                </li>
                <li class="nav-item">
                ASD;
                        }
                        ?>
                        <a class="nav-link active" href="equipamiento.php">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>credit-card</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(453.000000, 454.000000)">
                                                    <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                    </path>
                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Equipamiento</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if ($area == 1) {
                            echo <<< ASD
                    <a class="nav-link" href="asignaciones.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Asignación equipos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="devoluciones.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.2727272Notebooks7 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Devolución equipo</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">MANTENEDOR SISTEMA</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mantenedores.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(304.000000, 151.000000)">
                                                <polygon class="color-background opacity-6"
                                                    points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                </polygon>
                                                <path class="color-background opacity-6"
                                                    d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Mantenedor equipos</span>
                    </a>
                </li>

                <li class="nav-item">
                ASD;
                        }
                        ?>
                        <a class="nav-link  " href="access_exit.php">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>spaceship</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(4.000000, 301.000000)">
                                                    <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                    </path>
                                                    <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                    </path>
                                                    <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z">
                                                    </path>
                                                    <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </div>

        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        </ol>
                        <h6 class="font-weight-bolder mb-0">Equipamiento</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                        </div>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

                <?php
                if ($area == 1) {
                    echo <<< EOT
            <div class="col-12">

                <a class="btn btn-success btn-sm" href="formulario_registrar_equipo.php">Agregar nuevo
                    equipo</a>
                    
                <!-- Definicion de pestañas -->
            
            EOT;
                }
                ?>
                <a class="btn btn-success btn-sm" href="generar_reporte_equipo.php">Generar Informe</a>
            </div>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Equipos Notebooks</a></li>
                    <li><a href="#tabs-2">Equipos PCs Estacionarios</a></li>
                    <li><a href="#tabs-3">Equipos Celulares</a></li>
                    <li><a href="#tabs-4">Equipos Bam</a></li>
                    <li><a href="#tabs-5">Equipos Impresoras</a></li>
                    <li><a href="#tabs-6">Equipos Monitores</a></li>
                    <li><a href="#tabs-7">Equipos De Baja</a></li>
                </ul>
                <!-- Pestaña notebooks -->
                <div id="tabs-1">

                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla Notebooks</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            PROCESADOR  </th>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            RAM</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            ADJUNTAR FACTURA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" <?php
                                                                    if ($area == 3) {
                                                                        echo 'style="display: none;"';
                                                                    } ?>>
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" <?php
                                                                    if ($area == 3) {
                                                                        echo 'style="display: none;"';
                                                                    } ?>>
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <!-- inicio de tabla notebooks -->

                                                    <?php
                                                    foreach ($equipos as $equipo) { ?>
                                                        <tr>
                                                            <td class="mb-0 text-sm">
                                                                <h7><?php echo $equipo["serial_equipo"] ?></h7>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $equipo["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["procesador_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["capacidad_hdd_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["ram_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $equipo["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm">
                                                                <form action="guardararchivo.php" method="POST" class="form-inline" enctype="multipart/form-data">
                                                                    <div>
                                                                        <input type="file" name="archivoPDF">
                                                                        <!-- <label  for="file">Adjuntar Factura</label> -->
                                                                    </div>
                                                                    <div>
                                                                    <input type="submit" value="Subir Factura">
                                                                    </div>
                                                                </form>
                                                            </td>

                                                            <td class="text-sm" <?php
                                                                                if ($area == 3) {
                                                                                    echo 'style="display: none;"';
                                                                                } ?>>
                                                                <a href="editer_equipo.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm" <?php
                                                                                if ($area == 3) {
                                                                                    echo 'style="display: none;"';
                                                                                } ?>>
                                                                <a href="eliminar_equipos.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>



                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pestaña PCs Torres -->
                <div id="tabs-2">notebooks

                    <div class="row">
                        <div class="container-notebooksfluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla PCs Estacionarios</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            PROCESADOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            HDD/SSD</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            RAM</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <!-- inicio de tabla PCs Torres -->

                                                    <?php
                                                    foreach ($torres as $torre) { ?>

                                                        <tr>
                                                            <td class="text-xxs">
                                                                <h6><?php echo $torre["serial_equipo"] ?></h6>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $torre["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["procesador_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["capacidad_hdd_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["ram_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $torre["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm">

                                                                <a href="editer_equipo.php?id=<?php echo $torre["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="eliminar_equipos.php?id=<?php echo $torre["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pestaña celulares -->
                <div id="tabs-3">

                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla celulares</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <!-- inicio de tabla celulares -->

                                                    <?php
                                                    foreach ($celulares as $celular) { ?>

                                                        <tr>
                                                            <td class="text-xxs">
                                                                <h6><?php echo $celular["serial_equipo"] ?></h6>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $celular["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $celular["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $celular["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $celular["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm">

                                                                <a href="editer_equipo.php?id=<?php echo $celular["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="eliminar_equipos.php?id=<?php echo $celular["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pestaña Bam -->
                <div id="tabs-4">

                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla Bams</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <!-- inicio de tabla bams -->

                                                    <?php
                                                    foreach ($bams as $bam) { ?>

                                                        <tr>
                                                            <td class="text-xxs">
                                                                <h6><?php echo $bam["serial_equipo"] ?></h6>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $bam["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $bam["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $bam["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $bam["fecha_compra_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="editer_equipo.php?id=<?php echo $celular["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="eliminar_equipos.php?id=<?php echo $bam["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pestaña Impresoras -->
                <div id="tabs-5">

                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla Impresoras</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <!-- inicio de tabla impresoras -->

                                                    <?php
                                                    foreach ($prints as $print) { ?>

                                                        <tr>
                                                            <td class="text-xxs">
                                                                <h6><?php echo $print["serial_equipo"] ?></h6>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $print["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $print["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $print["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $print["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm">

                                                                <a href="editer_equipo.php?id=<?php echo $print["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="eliminar_equipos.php?id=<?php echo $print["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pestaña Monitores -->
                <div id="tabs-6">

                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla Monitores</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <!-- inicio de tabla monitores -->

                                                    <?php
                                                    foreach ($screens as $screen) { ?>

                                                        <tr>
                                                            <td class="text-xxs">
                                                                <h6><?php echo $screen["serial_equipo"] ?></h6>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $screen["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $screen["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $screen["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $screen["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm">

                                                                <a href="editer_equipo.php?id=<?php echo $screen["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm">
                                                                <a href="eliminar_equipos.php?id=<?php echo $screen["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pestaña Bajas -->
                <div id="tabs-7">
                    <div class="row">
                        <div class="container-fluid py-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Tabla bajas</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs">SERIAL</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MARCA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            MODELO</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            PROCESADOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            RAM</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            VALOR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            FECHA COMPRA</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" <?php
                                                                                                                                        if ($area == 3) {
                                                                                                                                            echo 'style="display: none;"';
                                                                                                                                        } ?>>
                                                            EDITAR</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" <?php
                                                                                                                                        if ($area == 3) {
                                                                                                                                            echo 'style="display: none;"';
                                                                                                                                        } ?>>
                                                            BAJA</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <!-- inicio de tabla bajas -->

                                                    <?php
                                                    foreach ($bajas as $baja) { ?>
                                                        <tr>
                                                            <td class="mb-0 text-sm">
                                                                <h7><?php echo $baja["serial_equipo"] ?></h7>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["marca_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-xxs">
                                                                <small><?php echo $baja["modelo_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["procesador_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["capacidad_hdd_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["ram_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["valor_equipo"] ?></small>
                                                            </td>
                                                            <td class="text-sm">
                                                                <small><?php echo $baja["fecha_compra_equipo"] ?></small>
                                                            </td>

                                                            <td class="text-sm" <?php
                                                                                if ($area == 3) {
                                                                                    echo 'style="display: none;"';
                                                                                } ?>>
                                                                <a href="editer_equipo.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td class="text-sm" <?php
                                                                                if ($area == 3) {
                                                                                    echo 'style="display: none;"';
                                                                                } ?>>
                                                                <a href="eliminar_equipos.php?id=<?php echo $equipo["id_equipo"] ?>" class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>



                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">MDA -
                                    Área TI</a>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
        </main>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>

        <!--   Core JS Files   -->
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    header('location: index.php');
}
?>