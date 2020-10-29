<section class="seccion contenedor">


    <!-- Función de invitados -->

    <?php
        try {
        //Inicia la conexion a la base de datos
        require_once('includes/funciones/bd_conexion.php');
        // Esta es la query en sí misma o la consulta que hacemos a la conexión realizada previamente
        $sql = " SELECT * FROM `invitados` ";
        // Aquí guardamos la consulta a la conexión
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }

     ?>
       <section class="invitados contenedor seccion">
           <h2>Nuestros Invitados</h2>
           <ul class="lista-invitados clearfix">

       <?php
         // Aquí asociamos a una variable la consulta separada en row por fetch_assoc
         while( $invitados = $resultado->fetch_assoc() ) { ?>

                   <li>
                       <div class="invitado">
                         <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                           <img src="img/invitados/<?php echo $invitados['url_imagen']; ?>" alt="Imagen Invitado">
                           <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></p>
                         </a>
                       </div>
                   </li>
                   <div style="display:none;">
                     <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                       <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'];?></h2>
                       <img src="img/invitados/<?php echo $invitados['url_imagen']; ?>" alt="Imagen Invitado">
                       <p><?php echo $invitados['descripcion']; ?></p>
                     </div>
                   </div>
    <?php } ?>
      </ul>
  </section>

     </div>

     <?php
      $conn->close();
      ?>
</section>
