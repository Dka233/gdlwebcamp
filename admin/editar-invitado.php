<?php
      include_once 'funciones/sesiones.php';
      include_once 'templates/header.php';
      include_once 'funciones/funciones.php';
      $id = $_GET['id'];
      if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!");
      }
?>

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
            <h1>Crear Invitado</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Invitado</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="card-body">
              <!-- general form elements -->
              <div class="card card-primary">
                <?php
                $sql = "SELECT * FROM invitados WHERE `invitado_id` = $id ";
                $resultado = $conn->query($sql);
                $invitado = $resultado->fetch_assoc();
                 ?>
                <div class="card-header">
                  <h3 class="card-title">Editar Invitado</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="guardar-registro-archivo" id="guardar-registro-archivo" action="modelo-invitado.php" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre_invitado">Nombre</label>
                      <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" value="<?php echo $invitado['nombre_invitado'] ?>">
                      <label for="apellido_invitado">Apellido</label>
                      <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" value="<?php echo $invitado['apellido_invitado'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea class="form-control" rows="3" name="biografia_invitado"><?php echo $invitado['descripcion'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="imagen_actual">Imagen actual</label>
                      <div class="form-group">

                      <img src="../img/invitados/<?php echo $invitado['url_imagen'] ?>" width=200px>
                    </div>

                    </div>
                    <div class="form-group">
                      <label for="imagen_invitado">Imagen</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                          <label class="custom-file-label" for="imagen_invitado"><?php echo $invitado['url_imagen'] ?></label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id'] ?>">
                    <button id="button" type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <!-- Si se quisiera introducir un footer en el creador de Admin, va aquí -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include_once 'templates/footer.php' ?>
