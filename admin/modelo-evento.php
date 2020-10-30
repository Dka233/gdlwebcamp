<?php
  include_once 'funciones/funciones.php';
  $titulo = $_POST['titulo_evento'];
  $categoria_id = $_POST['categoria_evento'];
  $invitado_id = $_POST['invitado_evento'];
  // obtener la fecha en formato inserción DB
  $fecha = $_POST['fecha_evento'];
  $fecha_formateada = date('Y-m-d', strtotime($fecha));

  // hora_evento con formato BD
  $hora = $_POST['hora_evento'];
  $hora_formateada = date('H:i:s', strtotime($hora));

  $id_registro = $_POST['id_registro'];



  // CREAR EVENTO
  if($_POST['registro'] == 'nuevo') {
    try {
      $stmt = $conn->prepare("INSERT INTO eventos (`nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv` ) VALUES ( ? , ?, ?, ?, ?) ");
      $stmt->bind_param("sssii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
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

  // EDITAR EVENTO

  if($_POST['registro'] == 'actualizar') {

    try {
      $stmt = $conn->prepare('UPDATE eventos SET `nombre_evento` = ?, `fecha_evento` = ?, `hora_evento` = ?, `id_cat_evento` = ?, `id_inv` = ?, `editado` = NOW() WHERE `evento_id` = ? ');
      $stmt->bind_param("sssiii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);
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

  // ELIMINAR EVENTO

  if($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];
    try {
      $stmt = $conn->prepare("DELETE FROM eventos WHERE `evento_id` = ? ");
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
