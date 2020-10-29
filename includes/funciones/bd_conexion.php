<?php
// Archivo que establece la conexión con la base de datos
  $conn = new mysqli('localhost', 'root', 'root', 'gdlwebcamp');
  if($conn->connect_error) {
    echo $error -> $conn->connect_error;
  }
?>
