<?php
  include_once 'funciones/funciones.php';

  $nombre = $_POST['nombre_invitado'];
  $apellido = $_POST['apellido_invitado'];
  $biografia = $_POST['biografia_invitado'];
  $id_registro = $_POST['id_registro'];



  // CREAR INVITADO
  if($_POST['registro'] == 'nuevo') {
    /* // Sistema para ver los datos que se envían por POST y FILES
    $respuesta = array (
      'post' => $_POST,
      'file' => $_FILES
    );
    die(json_encode($respuesta));*/

    $directorio = "../img/invitados/";

    if (!is_dir($directorio)) {
      mkdir($directorio, 0755, true);
    }

    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
      $imagen_url = $_FILES['archivo_imagen']['name'];
      $imagen_resultado = "Se subió correctamente";
    } else {
      $respuesta = array (
        'respuesta' => error_get_last()
      );
    }

    try {
      $stmt = $conn->prepare("INSERT INTO invitados (`nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen` ) VALUES ( ? , ? , ? , ? ) ");
      $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
      $stmt->execute();
      if($stmt->affected_rows) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_insertado' => $stmt->insert_id,
          'resultado_imagen' => $imagen_resultado
        );
      } else {
        $respuesta = array(
          'respuesta' => 'error'
        );
      }
      $stmt->close();
      $conn->close();
    } catch (\Exception $e) {
      $e->getMessage();
    }
    die(json_encode($respuesta));
  }

  // EDITAR INVITADO

  if($_POST['registro'] == 'actualizar') {

    $directorio = "../img/invitados/";

    if (!is_dir($directorio)) {
      mkdir($directorio, 0755, true);
    }

    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
      $imagen_url = $_FILES['archivo_imagen']['name'];
      $imagen_resultado = "Se subió correctamente";
    } else {
      $respuesta = array (
        'respuesta' => error_get_last()
      );
    }

    try {

      if ($_FILES['archivo_imagen']['size'] > 0) {
        // Con imagen...
        $stmt = $conn->prepare('UPDATE invitados SET `nombre_invitado` = ?, `apellido_invitado` = ?, `descripcion` = ? , `url_imagen` = ?, `editado` = NOW() WHERE `invitado_id` = ? ');
        $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
      } else {
        // Sin imagen...
        $stmt = $conn->prepare('UPDATE invitados SET `nombre_invitado` = ?, `apellido_invitado` = ?, `descripcion` = ?, `editado` = NOW() WHERE `invitado_id` = ? ');
        $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
      }
      $stmt->execute();
      //$registros = $stmt->affected_rows;
      if($stmt->affected_rows) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_actualizado' => $stmt->insert_id
        );
      } else {
        $respuesta = array(
          'respuesta' => 'error'
        );
      }
      $stmt->close();
      $conn->close();
    } catch (\Exception $e) {
      $e->getMessage();
    }
    die(json_encode($respuesta));
  }

  // ELIMINAR INVITADO

  if($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];
    try {
      $stmt = $conn->prepare("DELETE FROM invitados WHERE `invitado_id` = ? ");
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
