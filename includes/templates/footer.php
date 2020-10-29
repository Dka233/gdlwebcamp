    <!-- Inicio Footer -->
    <footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>GdLWebCamp</span> </h3>
                <p>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus. Vivamus convallis volutpat massa eget vestibulum.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Últimos <span>Tweets</span> </h3>
                <ul>
                    <li>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus.</li>
                    <li>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus.</li>
                    <li>Sed molestie et nisl at viverra. Donec eget rutrum massa. Morbi egestas justo quis tempor cursus.</li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>Sociales</span> </h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>
        <p class="copyright">Todos los Derechos Reservados GdLWebCamp 2016.</p>
    </footer>









    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="js/map.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jqueryv3.5.1.js"></script>
    <script src="js/jquery.animateNumber.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/jquery.lettering.js"></script>

    <?php
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace('.php',"", $archivo);
      if($pagina == 'invitados' || $pagina == 'index'){
        echo '<script src="js/jquery.colorbox-min.js"></script>';
      } else if($pagina == 'conferencias') {
        echo '<script src="js/lightbox.js"></script>';
      }
     ?>
    <script src="js/main.js"></script>


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/3cd4a665347860acb50c80d7a/264f66c44bd14e9f6d84eb584.js");</script>
</body>

</html>
