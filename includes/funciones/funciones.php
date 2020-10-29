<?php
//Función que toma los valores de los boletos, de las camisas y etiquetas de la página 'validar_registro' y crea un json con ellos
  function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0) {
      //Para ello lo primero que hace es guardar los valores "0", "1" y "2" con palabras "un día" etc
      $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');
      //Despues combina el array de los boletos de validar_registro.php con el que acabamos de crear para que el nº de boletos tenga nombre propio
      $total_boletos = array_combine($dias, $boletos);
      //Finalmente empezamos con el json. Lo primero que hace es crear un array llamada json donde irá guardando las iteraciones del siguiente foreach
      $json = array();

      //Con este foreach recorre el array de los boletos
      foreach($total_boletos as $key => $boletos):
        //Si el nº de boletos adquirido es mayor que 0
        //Por otro lado, INT convierte el string en nº entero
        if((int) $boletos > 0):
          //Captura en el array json cada boleto
          $json[$key] = (int) $boletos;
        endif;
      endforeach;

      $camisas = (int) $camisas;
      if($camisas > 0):
        $json['camisas'] = $camisas;
      endif;

      $etiquetas = (int) $etiquetas;
      if($etiquetas > 0):
        $json['etiquetas'] = $etiquetas;
      endif;


      //Devuelve un Array en formato Json, si lo vieramos con var_dump antes de pasarle el json_encode solo veríamos un array renombrado
      return json_encode($json);
  }
// Vamos a replicar el código de la función de arriba para hacer un json de los eventos
  function eventos_json(&$eventos) {
    $eventos_json = array();
    foreach($eventos as $evento):
      $eventos_json['eventos'][] = $evento;
    endforeach;

    return json_encode($eventos_json);
  }
?>
