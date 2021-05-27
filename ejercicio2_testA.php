<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 2 A</title>
   <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<?php
   include_once('include/functions.inc.php');

   $resultado = json_decode(post('http://localhost/DAW/Tema7/Tarea7/ejercicio2/service.php',
                     [
                        'n1'=>7,
                        'n2'=>10
                     ], true));

   if($resultado != null) {
      echo "<p><b>Resultado:</b> ".$resultado->result."</p>";
      echo "<p><b>Status:</b> ".$resultado->status."</p>";
   }
?>
   
</body>
</html>


