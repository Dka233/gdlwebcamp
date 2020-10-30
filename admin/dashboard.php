<?php include_once 'funciones/sesiones.php' ?>
<?php include_once 'templates/header.php' ?>

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
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Registrados por Día</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>


      <h2 class="page-header">Resumen de Registros</h2>

      <div class="row">
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`ID_registrado`) AS registros FROM registrados ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`ID_registrado`) AS registros FROM registrados WHERE `pagado` = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total Pagados</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-check"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`ID_registrado`) AS registros FROM registrados WHERE `pagado` = 0 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Pendiente de Pago</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-times"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT SUM(`total_pagado`) AS pagado FROM registrados WHERE `pagado` = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $registrados['pagado']; ?> €</h3>

              <p>Total Pagado</p>
            </div>
            <div class="icon">
              <i class="fas fa-euro-sign"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <h2 class="page-header">Regalos</h2>
      <div class="row">
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`regalo`) AS pulseras FROM registrados WHERE `pagado` = 1 AND `regalo` = 1";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $registrados['pulseras']; ?></h3>

              <p>Total Pulseras Confirmadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-ring"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`regalo`) AS pulseras FROM registrados WHERE `pagado` = 1 AND `regalo` = 2";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $registrados['pulseras']; ?></h3>

              <p>Total Etiquetas Confirmadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-tshirt"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <?php
            $sql = " SELECT COUNT(`regalo`) AS pulseras FROM registrados WHERE `pagado` = 1 AND `regalo` = 3";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
           ?>

          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $registrados['pulseras']; ?></h3>

              <p>Total Plumas Confirmadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-feather"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Ver Todos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include_once 'templates/footer.php' ?>
