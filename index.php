<?php include_once 'includes/templates/header.php' ?>

    <!-- Inicio Descripción Evento  -->
    <section class="seccion contenedor">
        <h2>La mejor Conferencia de Diseño Web en español</h2>
        <p>Mauris sed fringilla erat. Suspendisse tempus lacinia erat vel faucibus. Nulla eget venenatis diam. Morbi eu sapien nec augue eleifend accumsan. Pellentesque massa neque, faucibus non pulvinar id, aliquam vitae metus. Phasellus vel dignissim dui,
            quis commodo dolor. Aliquam ultricies est vel ante pharetra, in egestas tortor ornare.</p>
    </section>
    <!-- Fin Descripción Evento -->

    <!-- Inicio Programación -->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogv">
        </video>
        </div>
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>
					        <?php
								try {
								//Inicia la conexion a la base de datos
								require_once('includes/funciones/bd_conexion.php');
								// Esta es la query en sí misma o la consulta que hacemos a la conexión realizada previamente
								$sql = " SELECT * FROM `categoria_evento`";
								// Esta es la variable que recoge el resultado de esa consulta. La consulta es "query($sql)"
								// En este caso -> es el operador que nos permite acceder al metodo query hecho a la variable $conn
								// Que es nuestra conexión con la base de datos. Este método captura la consulta grabada en la variable $sql
								$resultado = $conn->query($sql);
							  } catch (\Exception $e) {
								echo $e->getMessage();
							  }

							 ?>
					
                    <nav class="menu-programa">
						<?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <a href="#<?php echo strtolower($cat['cat_evento'])?>"><i class="fas <?php echo $cat['icono']?>"></i><?php echo $cat['cat_evento']?></a>
						<?php } ?>
                    </nav>
                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>HTML5, CSS3 y JavaScript</h3>
                            <p><i class="far fa-clock"></i>14:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Douglas García</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Responsive Web Design</h3>
                            <p><i class="far fa-clock"></i>10:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Douglas García</p>
                        </div>
                        <a href="calendario.php" class="button float-right">Ver Todos</a>
                    </div>
                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Como ser Freelancer</h3>
                            <p><i class="far fa-clock"></i>10:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Gregorio Sanchez</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Tecnologías del Futuro</h3>
                            <p><i class="far fa-clock"></i>17:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Susan Sanchez</p>
                        </div>
                        <a href="calendario.php" class="button float-right">Ver Todos</a>
                    </div>
                    <div id="seminario" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Diseño móvil</h3>
                            <p><i class="far fa-clock"></i>17:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>12 de Dic</p>
                            <p><i class="fas fa-user"></i>Harold García</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Aprende a Programar</h3>
                            <p><i class="far fa-clock"></i>10:00 hrs</p>
                            <p><i class="far fa-calendar-alt"></i>12 de Dic</p>
                            <p><i class="fas fa-user"></i>Susana Rivera</p>
                        </div>
                        <a href="calendario.php" class="button float-right">Ver Todos</a>
                    </div>
                </div>
            </div>
    </section>

    <!-- Fin Programaciónav -->
    <!-- Inicio Invitados -->

    <?php include_once 'includes/templates/invitados.php' ?>

    <!-- Fin Invitados -->

    <!-- Inicio Contador -->
    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p>Invitados</li>
                <li>
                    <p class="numero"></p>Talleres</li>
                <li>
                    <p class="numero"></p>Días</li>
                <li>
                    <p class="numero"></p>Conferencias</li>
            </ul>
        </div>
    </div>
    <!-- Fin Contador -->
    <!-- Inicio Precios -->
    <section class="seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">30€</p>
                        <ul>
                            <li><i class="fas fa-check check"></i> Bocadillos gratis</li>
                            <li><i class="fas fa-check check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos los días</h3>
                        <p class="numero">50€</p>
                        <ul>
                            <li><i class="fas fa-check check"></i> Bocadillos gratis</li>
                            <li><i class="fas fa-check check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check check"></i> Todos los talleres</li>
                            <a href="#" class="button">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 días</h3>
                        <p class="numero">45€</p>
                        <ul>
                            <li><i class="fas fa-check check"></i> Bocadillos gratis</li>
                            <li><i class="fas fa-check check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                </ul>
        </div>
    </section>
    <!-- Fin Precios -->
    <!-- Inicio Mapa -->
    <div id="mapa" class="mapa"></div>
    <!-- Fin Mapa -->
    <!-- Inicio Testimonios -->
    <section class="seccion">
        <h2>Testimonios</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus. Vivamus convallis volutpat massa eget vestibulum.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Daniel García Marquez <span>Diseñador en @prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus. Vivamus convallis volutpat massa eget vestibulum.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Daniel García Marquez <span>Diseñador en @prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus. Vivamus convallis volutpat massa eget vestibulum.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Daniel García Marquez <span>Diseñador en @prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>
    <!-- Fin Testimonios -->
    <!-- Inicio Newsletter -->
    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Regístrate al Newsletter:</p>
            <h3>GdLWebCamp</h3>
            <a href="registro.php" class="button transparente">Registro</a>
        </div>
    </div>
    <!-- Fin Newsletter -->
    <!-- Contador -->
    <section class="seccion">
        <h2>faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p>días</li>
                <li>
                    <p id="horas" class="numero"></p>horas</li>
                <li>
                    <p id="minutos" class="numero"></p>minutos</li>
                <li>
                    <p id="segundos" class="numero"></p>segundos</li>
            </ul>
        </div>
    </section>
    <!-- Fin Contador -->

    <?php include_once 'includes/templates/footer.php' ?>
