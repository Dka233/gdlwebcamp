<?php include_once 'funciones/sesiones.php' ?>
<?php include_once 'templates/header.php';
      include_once 'funciones/funciones.php' ?>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<!-- Navbar -->

<?php include_once 'templates/barra.php' ?>


  <!-- Main Sidebar Container -->

 <?php include_once 'templates/navegacion.php' ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
              <li class="breadcrumb-item active">Registrados</li>
            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registrados a GdLWebCamp</h3>
                <div class="alert alert-danger" role="alert">
                    Este módulo <span class="alert-link">no está terminado</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>E-Mail</th>
                    <th>Fecha Registro</th>
                    <th>Artículos</th>
                    <th>Talleres</th>
                    <th>Regalos</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                        $sql = "SELECT registrados.*, regalos.`nombre_regalo` FROM registrados JOIN regalos ON registrados.`regalo` = regalos.`ID_regalo`";
                        $resultado = $conn->query($sql);
                      } catch (\Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      $registrados = $resultado->fetch_assoc();


                      while ($registrados = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $registrados['nombre_registrado'] . " " . $registrados['apellido_registrado'];
                                echo "<br>";
                                $pagado = $registrados['pagado'];
                                if ($pagado) {
                                  echo '<span class="badge bg-green">Pagado<span>';
                                } else {
                                  echo '<span class="badge bg-red">No Pagado<span>';
                                }

                          ?></td>
                          <td><?php echo $registrados['email_registrado']?></td>
                          <td><?php echo $registrados['fecha_registro']?></td>
                          <td>
                            <?php
                            $articulos = json_decode($registrados['pases_articulos'], true);
                            $array_articulos = array(
                              'un_dia' => 'Pase por un día',
                              'pase_completo' => 'Pase Completo',
                              'pase_2dias' => 'Pase de dos días',
                              'etiquetas' => 'Etiquetas',
                              'camisas' => 'Camisas'
                            );

                            foreach ($articulos as $key => $articulo) {
                              echo $articulo . " " . $array_articulos[$key] . "<br>";
                            }

                            ?>
                          </td>
                          <td>
                            <?php
                            $eventos_resultado = $registrados['talleres_registrados'];
                            $talleres = json_decode($eventos_resultado, true);

                            $talleres_imp = implode("', '", $talleres['eventos']);

                            $sql_talleres = "SELECT `nombre_evento`, `fecha_evento`, `hora_evento` FROM eventos WHERE `clave` IN (' $talleres_imp ') ";
                            $resultado_talleres = $conn->query($sql_talleres);
                            $eventos = $resultado_talleres->fetch_assoc();


                            while ($eventos = $resultado_talleres->fetch_assoc()) {
                              echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . " " . "<br>";
                            }
                            ?>

                          </td>
                          <td><?php echo $registrados['nombre_regalo']?></td>
                          <td><?php echo $registrados['total_pagado']?></td>
                          <td>
                            <a href="editar-registro.php?id=<?php echo $registrados['ID_registrado'] ?>" class="btn bg-orange btn-flat margin">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" data-id="<?php echo $registrados['ID_registrado'] ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                    <?php  } ?>


                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>E-Mail</th>
                      <th>Fecha Registro</th>
                      <th>Artículos</th>
                      <th>Talleres</th>
                      <th>Regalos</th>
                      <th>Compra</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include_once 'templates/footer.php' ?>
