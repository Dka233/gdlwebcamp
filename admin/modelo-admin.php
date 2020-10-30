<?php
  include_once 'funciones/funciones.php';
  $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $password = $_POST['password'];
  $id_registro = $_POST['id_registro'];


  // CREAR ADMIN
  // Con esta parte del código, leemos los datos que se envían en el método POST
  if($_POST['registro'] == 'nuevo') {
    // Estas opciones son para hashear el password
    $opciones = array (
      'cost' => 12
    );
    //Aquí se guarda el password hasheado
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    try {
      //En funciones se incluye la conexión a la BD
      include_once 'funciones/funciones.php';
      // Y el statement para insertar el usuario en la BD
      $stmt = $conn->prepare("INSERT INTO admins (`usuario`, `nombre`, `password`, `editado`) VALUES (?, ?, ?, NOW()) ");
      $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
      $stmt->execute();
      $id_registro = $stmt->insert_id;
      // Esta parte es la que se capturamos en AJAX con jscon_encode$respuesta. Estos datos los envíamos y en función de lo que obtengamos, AJAX mostrará un resultado u otro
      if($id_registro > 0) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_admin' => $id_registro
        );
      } else {
          $respuesta = array(
              'respuesta' => 'error'
          );
      };
      $stmt->close();
      $conn->close();
    } catch (\Exception $e) {
      echo $e->getMessage;
    }
    die(json_encode($respuesta));
  }

  //EDITAR ADMIN

  if($_POST['registro'] == 'actualizar') {

    try {
      if(empty($_POST['password'])){
        $stmt = $conn->prepare("UPDATE admins SET `usuario` = ?, `nombre` = ?, `editado` = NOW() WHERE `id_admin` = ? ");
        $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
      } else {
        $opciones = array(
          'cost' => 12
        );
        $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
        // Nota: cuidado con las querys de SQL pues afectan al código de PHP. Después del último ? no debe haber comas
        $stmt = $conn->prepare("UPDATE admins SET `usuario` = ?, `nombre` = ?, `password` = ?, `editado` = NOW() WHERE `id_admin` = ? ");
        $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
      }


      $stmt->execute();
      if($stmt->affected_rows) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_actualizado' => $stmt->insert_id
        );
      } else {
        $respuesta = array(
          'respuesta' => 'error'
        );
      };
      $stmt->close();
      $conn->close();
    } catch (\Exception $e) {
      echo $e->getMessage;
    }
    die(json_encode($respuesta));
  }

  // ELIMINAR ADMIN
  if($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];
    try {
      $stmt = $conn->prepare("DELETE FROM admins WHERE `id_admin` = ?");
      $stmt->bind_param('i', $id_borrar);
      $stmt->execute();
      if($stmt->affected_rows) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_eliminado' =>$id_borrar
        );
      } else {
        $respuesta = array(
          'respuesta' => 'error',
        );
      }
    } catch (\Exception $e) {
      echo $e->getMessage;
    }
    die(json_encode($respuesta));
  }

 ?>
