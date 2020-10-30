<?php
  // Si no está autenticado te devuelve al login
  function usuario_autenticado() {
    if(!revisar_usuario() ) {
      header('Location:login.php');
      exit();
    }
  }
  // Revisa si el usuario está autenticado
  function revisar_usuario() {
    return isset($_SESSION['usuario']);
  }
  session_start();

  $inactividad = 600;

  if(isset($_SESSION['timeout'])){
    $sessionTTL = time() - $_SESSION['timeout'];
    if($sessionTTL > $inactividad){
      session_destroy();
      header('Location:login.php');
    }
  }


  session_start();
  usuario_autenticado();

  $_SESSION['timeout'] = time();
