

<?php include_once 'includes/templates/header.php' ?>


<section class="seccion contenedor">

      <h2>Calendario de Eventos</h2>

        <!-- Función de calendario -->

        <?php
            try {
            //Inicia la conexion a la base de datos
            require_once('includes/funciones/bd_conexion.php');
            // Esta es la query en sí misma o la consulta que hacemos a la conexión realizada previamente
            $sql = " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono` ,`nombre_invitado`, `apellido_invitado` ";
            $sql .= " FROM `eventos` ";
            $sql .= " INNER JOIN `categoria_evento` ";
            $sql .= " ON `eventos`.`id_cat_evento` = `categoria_evento`.`id_categoria` ";
            $sql .= " INNER JOIN `invitados` ";
            $sql .= " ON `eventos`.`id_inv` = `invitados`.`invitado_id` ";
            $sql .= " ORDER BY `evento_id` ";
            // Esta es la variable que recoge el resultado de esa consulta. La consulta es "query($sql)"
            // En este caso -> es el operador que nos permite acceder al metodo query hecho a la variable $conn
            // Que es nuestra conexión con la base de datos. Este método captura la consulta grabada en la variable $sql
            $resultado = $conn->query($sql);
          } catch (\Exception $e) {
            echo $e->getMessage();
          }

         ?>



           <?php

           //Formando el Array que incluirá los datos de los eventos
             $calendario = array();
             while( $eventos = $resultado->fetch_assoc() ) {
               // La variable Eventos tiene toda la información
               // Porque es un fetch_assoc de la variable resultado que contiene toda la query.
               // Se ponen tantas variables porque una lleva la query, otra la conexión, y otra el resultado de la query a la conexión

               //a variable fecha tiene concretamente la fecha del evento y se usará después, para ORANIZAR el calendario.
               $fecha = $eventos['fecha_evento'];
               // Con la variable Evento formamos un array nuevo que basicamente lo que hace es renombrar los datos que ya estaban en eventos
               $evento = array(
                 'titulo' => $eventos['nombre_evento'],
                 'fecha' => $eventos['fecha_evento'],
                 'hora' => $eventos['hora_evento'],
                 'categoria' => $eventos['cat_evento'],
                 'icono' => "fa" . " " . $eventos['icono'], //Aquí sí se puede ver la utilidad real de reescribir todo en un nuevo array que se agrupe en evento
                 'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
               );
               // Con esto finalmente ordenamos la variable Evento creada antes en su agrupación por fechas.
               $calendario[$fecha][] = $evento;
             } //while de fetch_assoc
             ?>

             <div class="calendario">

              <?php
              // Imprime todos los Eventos
              foreach($calendario as $dia => $lista_eventos) { ?>
                <h3>
                  <i class="fa fa-calendar"></i>

                  <?php
                  // Solucionar el nombre de la fecha en Windows
                  setLocale(LC_TIME, 'spanish');

                  echo strftime( '%d de %B del %Y', strtotime($dia)); ?>
                </h3>

                  <?php foreach($lista_eventos as $evento) { ?>
                    <div class="dia">                  
                      <p class="titulo"> <?php echo $evento['titulo']; ?></p>
                      <p class="hora">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                      </p>
                      <p>
                        <i class="<?php echo $evento['icono'] ?>" aria-hidden="true"></i>
                        <?php echo $evento['categoria'] ?>
                      </p>
                      <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $evento['invitado'] ?>
                      </p>
                    </div>




                    <?php } //fin foreach eventos ?>

            <?php  } //fin Foreach de dias?>
          </div>




         <?php
          $conn->close();
          ?>

    </section>


    <?php include_once 'includes/templates/footer.php' ?>
