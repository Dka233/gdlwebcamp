<?php
  include_once 'funciones/funciones.php';
  $nombre_categoria = $_POST['nombre_categoria'];
  $icono = $_POST['icono'];
  $id_categoria = $_POST['id_registro'];
  // CREAR CATEGORÍA
  if($_POST['registro'] == 'nuevo') {
    try {
      $stmt = $conn->prepare("INSERT INTO categoria_evento (`cat_evento`, `icono` ) VALUES ( ? , ? ) ");
      $stmt->bind_param("ss", $nombre_categoria, $icono);
      $stmt->execute();
      if($stmt->affected_rows) {
        $respuesta = array(
          'respuesta' => 'exito',
          'id_insertado' => $stmt->insert_id
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

  // EDITAR CATEGORÍA

  if($_POST['registro'] == 'actualizar') {
    try {
      $stmt = $conn->prepare('UPDATE categoria_evento SET `cat_evento` = ?, `icono` = ?, `editado` = NOW() WHERE `id_categoria` = ? ');
      $stmt->bind_param("sss", $nombre_categoria, $icono, $id_categoria);
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
      }
      $stmt->close();
      $conn->close();
    } catch (\Exception $e) {
      $e->getMessage();
    }
    die(json_encode($respuesta));
  }

  // ELIMINAR CATEGORÍA

  if($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];
    try {
      $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE `id_categoria` = ? ");
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
