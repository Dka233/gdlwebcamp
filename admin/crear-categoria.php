<?php
      include_once 'funciones/sesiones.php';
      include_once 'templates/header.php';


      include_once 'funciones/funciones.php'
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
            <h1>Crear Categoría</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Nueva Categoría</h3>

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
                  <h3 class="card-title">Crear Categoría</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="guardar-registro" id="guardar-registro" action="modelo-categoria.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuario">Nombre</label>
                      <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre Categoría">
                    </div>
                    <div class="form-group">
                      <label for="icono">Icono</label>
                  <!-- <div class="input-group">
                           <input data-placement="bottomRight" class="form-control icp icp-auto" value="fas fa-archive"
                                  type="text"/>
                           <span class="input-group-addon"></span>
                       </div> -->
                       <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fas fa-address-book"></i>
                        </div>
                        <input type="text" class="form-control icp icp-auto" id="icono" name="icono" placeholder="fa icon">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button id="button" type="submit" class="btn btn-primary">Añadir</button>
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
