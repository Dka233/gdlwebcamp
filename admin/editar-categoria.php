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
            <h1>Crear Evento</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Categoría</h3>

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
                <div class="card-header">
                  <h3 class="card-title">Editar Categoría</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php
                $sql = "SELECT * FROM categoria_evento WHERE `id_categoria` = $id ";
                $resultado = $conn->query($sql);
                $categoria = $resultado->fetch_assoc();
                 ?>
                <form method="post" name="guardar-registro" id="guardar-registro" action="modelo-categoria.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuario">Título Categoría</label>
                      <input type="text" class="form-control" id="titulo_evento" name="nombre_categoria" placeholder="Título de la Categoría" value="<?php echo $categoria['cat_evento']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usuario">Icono Categoría</label>
                      <input type="text" class="form-control" id="titulo_evento" name="icono" placeholder="fa icon" value="<?php echo $categoria['icono']; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <button id="crear_registro" type="submit" class="btn btn-primary">Guardar</button>
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
