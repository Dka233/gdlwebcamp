<?php
// LOGIN
if(isset($_POST['login-admin'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  try {
    //En funciones se incluye la conexión a la BD
    include_once 'funciones/funciones.php';
    // Selecciona de Admins por Usuario
    $stmt = $conn->prepare("SELECT * FROM admins WHERE `usuario` = ?;");
    // El usuario que estamos pasando en el método Post
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    //Y te trae de ese usuario todos estos reultados alojándolos en esas variables que usaremos más adelante
    $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $nivel);
    if($stmt->affected_rows) {
      $existe = $stmt->fetch();
      if($existe) {
        // Verifica que el password coincida con el alojado en la BD
        if(password_verify($password, $password_admin)) {

          session_start();
          $_SESSION['usuario'] = $usuario_admin;
          $_SESSION['nombre'] = $nombre_admin;
          $_SESSION['nivel'] = $nivel;


          $respuesta = array(
            'respuesta' => 'exitoso',
            'usuario' => $nombre_admin
          );

        } else {

          $respuesta = array(
            'respuesta' => 'password_incorrecto'
          );

        }
      } /*else {
        $respuesta = array(
          'respuesta' => 'no_existe'
        );
      }*/
    }
  } catch (\Exception $e) {
    echo $e->getMessage;
  }
  die(json_encode($respuesta));

};

 ?>
