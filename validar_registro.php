<?php if(isset($_POST['submit'])):
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');
// Pedidos
//Toma los valores enviados por el metodo POST del precio calculado en main.js para las camisas, las etiquetas y los boletos
$camisas = $_POST['pedido_camisas'];
$etiquetas = $_POST['pedido_etiquetas'];
$boletos = $_POST['boletos'];
// Usa la función creaada en 'funciones/funciones.php' para asignar a la variable $pedido el json creado en esa función
include_once 'includes/funciones/funciones.php';
$pedido = productos_json($boletos, $camisas, $etiquetas);
//Eventos
$eventos = $_POST['registro'];
$registro = eventos_json($eventos);
// SQL Statement
// Con este código se insertan datos en la BD
try {
//Inicia la conexion a la base de datos
require_once('includes/funciones/bd_conexion.php');
//Se prepara el statement que vamos a insertar. La tabla en la que se inserta y las columnas que vamos a insertar
$stmt = $conn->prepare("INSERT INTO registrados (`nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
// Con el método bind_param se indican los datos que hemos "preparado" antes, recibidos por el método post. En ssssis, cada letra significa un tipo de dato
// las s que es texto y la i que es numero
$stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
//Ahora se ejecuta el statement
$stmt->execute();
//Y se cierran las conexiones
$stmt->close();
$conn->close();
//Por último esto, siempre que esté antes de todo lo demás, hace que no se puedan insertar más datos recargando la página
header('Location: validar_registro.php?exitoso=1');
} catch (\Exception $e) {
echo $e->getMessage();
}
endif;
?>
<?php include_once 'includes/templates/header.php' ?>

<!-- Resumen de registro de usuario -->
    <section class="seccion contenedor">
        <h2>Resumen Registro</h2>

        <?php if(isset($_GET['exitoso'])):
                if($_GET['exitoso'] == "1"):
                  echo "Se ha registrado con éxito en la conferencia!";
                  endif;
              endif; ?>




	</section>

    <?php include_once 'includes/templates/footer.php' ?>
