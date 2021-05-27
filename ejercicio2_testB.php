<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 2 A</title>
   <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
   <form action="" name="form2" method="POST">
      <fieldset>
      <legend>Introduzca operandos a sumar</legend>
         <p><label for="n1">Número 1: </label><input type="number" name="n1" maxlength="4" size="4"></p>
         <p><label for="n2">Número 2: </label><input type="number" name="n2" maxlength="4" size="4"></p>
         <p><input type="submit" value="Calcular" name="btnCalcular"></p>
      </fieldset>
   </form>
<?php

   include_once('include/functions.inc.php');

   if(isset($_POST['btnCalcular'])) {
      if(empty($_POST['n1']) || empty($_POST['n2'])) {
         echo "<p>Debe introducir los dos operandos</p>";
      } else {
         session_start();
         $n1 = $_POST['n1'];
         $n2 = $_POST['n2'];

         $resultado = json_decode(post('http://localhost/DAW/Tema7/Tarea7/ejercicio2/service.php',
                        [
                           'n1'=>$n1,
                           'n2'=>$n2
                        ], true));

         if($resultado != null) {
               $_SESSION['resultado'] = $resultado->result;
               $_SESSION['status'] = $resultado->status;
            } else {
               echo "<p>Error</p>";
            }
         }
   }

   if(isset($_SESSION['resultado'])) {
      echo "<p><b>Resultado:</b>".$_SESSION['resultado']."</p>";
      echo "<p><b>Resultado:</b>".$_SESSION['status']."</p>";
      }
   ?>
   
</body>
</html>