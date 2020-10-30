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
          <h3 class="card-title">Editar Evento</h3>

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
                  <h3 class="card-title">Editar Evento</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php
                $sql = "SELECT * FROM eventos WHERE `evento_id` = $id ";
                $resultado = $conn->query($sql);
                $evento = $resultado->fetch_assoc();
                 ?>
                <form method="post" name="guardar-registro" id="guardar-registro" action="modelo-evento.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuario">Título Evento</label>
                      <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Título del Evento" value="<?php echo $evento['nombre_evento']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="categoria">Invitado</label>
                      <select class="form-control select2" name="invitado_evento">
                        <option value="0">- Seleccione -</option>
                        <?php
                        try {
                          $invitado_actual = $evento['id_inv'];
                          $sql = "SELECT `invitado_id`, `nombre_invitado`, `apellido_invitado` FROM invitados ";
                          $resultado = $conn->query($sql);
                          while($invitados = $resultado->fetch_assoc()) { ?>
                            <?php if($evento['id_inv'] == $invitado_actual) { ?>
                              <option value="<?php echo $invitados['invitado_id']; ?>" selected><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></option>
                          <?php  } else { ?>
                            <option value="<?php echo $invitados['invitado_id']; ?>"><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></option>
                          <?php } ?>
                        <?php }  ?>
                        <?php } catch (\Exception $e) {
                          $e->getMessage();
                        }

                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="categoria">Categoría</label>
                      <select class="form-control select2" name="categoria_evento">
                        <option value="0">- Seleccione -</option>

                        <?php
                        try {
                          $categoria_actual = $evento['id_cat_evento'];
                          $sql = "SELECT * FROM categoria_evento";
                          $resultado = $conn->query($sql);
                          while($cat_evento = $resultado->fetch_assoc()) {
                            if($cat_evento['id_categoria'] == $categoria_actual) {   ?>
                              <option value="<?php echo $cat_evento['id_categoria']; ?>" selected><?php echo $cat_evento['cat_evento']; ?></option>
                          <?php  } else { ?>
                        <option value="<?php echo $cat_evento['id_categoria']; ?>"><?php echo $cat_evento['cat_evento']; ?></option>
                      <?php } ?>
                        <?php }  ?>
                        <?php } catch (\Exception $e) {
                          $e->getMessage();
                        }

                         ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <label>Fecha</label>
                    <?php
                    $fecha = $evento['fecha_evento'];
                    $fecha_formato = date('m/d/Y', strtotime($fecha));
                     ?>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="fecha_evento" value="<?php echo $fecha_formato ?>">
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Hora</label>
                        <?php
                        $hora = $evento['hora_evento'];
                        // la a de h:i hace que se vea bien el pm y el am
                        $hora_formato = date('h:i a', strtotime($hora));
                         ?>
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="hora_evento" value="<?php echo $hora_formato ?>">
                          <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text">
                              <i class="far fa-clock"></i>
                            </div>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
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
