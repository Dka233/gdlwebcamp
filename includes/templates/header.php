<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <script src="https://kit.fontawesome.com/d657966d55.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">

    <?php
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace('.php',"",$archivo);
      if($pagina == 'invitados' || $pagina == 'index'){
        echo '<link rel="stylesheet" href="css/colorbox.css">';
      } else if($pagina == "conferencias") {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
      }
     ?>


    <!-- <link rel="stylesheet" href="/css/fontawesome.css"> -->
    <!-- <link rel="stylesheet" href="/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />


    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina ?>">
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <!-- Inicio Header -->
    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <div class="candado float-right">
                      <a href="admin/login.php"><i class="fas fa-lock"></i></a>
                    </div>
                </nav>

                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="far fa-calendar-alt"></i> 10-12 dic</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Madrid, ESP</p>
                    </div>
                    <h1 class="nombre-sitio">GdLWebCamp</h1>
                    <p class="slogan">La mejor conferencia de <span>diseño web</span></p>

                </div>
            </div>

        </div>

    </header>
    <!-- Fin Header -->

    <!-- Inicio Navegación -->
    <div class="barra">
        <div class="contenedor clearfix">
            <a href="index.php">
                <div class="logo">
                    <img src="img/logo.svg" alt="">
                </div>
            </a>
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="navegacion-principal clearfix">
                <a href="conferencias.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservas</a>
            </nav>
        </div>
    </div>
    <!-- Fin Navegación -->
