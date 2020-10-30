<?php
      include_once 'funciones/sesiones.php';
      include_once 'funciones/funciones.php';

      $sql = " SELECT `fecha_registro`, COUNT(*) AS resultado FROM registrados GROUP BY `fecha_registro` ORDER BY `fecha_registro` ";
      $resultado = $conn->query($sql);

      $arreglo_registros = array();
      while($registro_dia = $resultado->fetch_assoc()) {
        $fecha = $registro_dia['fecha_registro'];
        $registro['fecha'] = $fecha;
        $registro['cantidad'] = $registro_dia['resultado'];

        $arreglo_registros[] = $registro;
      }
      echo $arreglo_registros;

      echo "<pre>";
      var_dump($arreglo_registros);
      echo "</pre>";
      echo $arreglo_registros['fecha'];

?>
