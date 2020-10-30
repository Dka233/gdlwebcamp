<?php
  session_start();
  $cerrar_sesion = $_GET['cerrar_sesion'];

  if($cerrar_sesion) {
    session_destroy();
  };

  include_once 'templates/header.php';

?>

<body class="hold-transition login-page">

 <div class="login-box">
   <div class="login-logo">
     <a href="../index.php"><b>GdLWebCamp</b> | Intranet</a>
   </div>
   <!-- /.login-logo -->

   <div class="card">
     <div class="card-body login-card-body">
       <p class="login-box-msg">Inicia Sesión</p>
       <form method="post" name="login-admin-form" id="login-admin" action="login-admin.php">
         <div class="input-group mb-3">
           <input name="usuario" type="text" class="form-control" placeholder="Usuario">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-user"></span>
             </div>
           </div>
         </div>
         <div class="input-group mb-3">
           <input name="password" type="password" class="form-control" placeholder="Contraseña">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-8">
             <div class="icheck-primary">
             </div>
           </div>
           <!-- /.col -->
           <div class="col-12">
            <input type="hidden" name="login-admin" value="1">
             <button type="submit" class="btn btn-primary btn-block">Acceder</button>
           </div>
           <!-- /.col -->
         </div>
       </form>
     </div>
     <!-- /.login-card-body -->
   </div>
 </div>
 <!-- /.login-box -->

 <?php include_once 'templates/footer.php' ?>
