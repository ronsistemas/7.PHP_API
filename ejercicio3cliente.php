<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 3</title>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
   <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
   <section class="container">
   <form action="" method="POST" name="form3">
      <fieldset>
         <legend>Localizaciones</legend>
         <label for="location">Seleccione localización</label>
         <select name="location">
            <option value="Torre Eiffel">Torre Eiffel</option>
            <option value="Alhambra">Alhambra</option>
            <option value="Coliseo">Coliseo de Roma</option>
            <option value="Monte Fuji">Monte Fuji</option>
         </select>
         <input type="submit" value="Consultar" name="btnConsultar">
      </fieldset>
   </form>

   <hr>
   <!--Sección que muestra resultado de consulta de localización-------------------->
   <?php
      include_once('include/functions.inc.php');

      if(isset($_POST['btnConsultar'])) {
         $location = $_POST['location'];

         $respuesta = json_decode(post('http://localhost/DAW/Tema7/Tarea7/ejercicio2/ejercicio2service.php',
                           $location, true));

          if( $respuesta->status == 'Error') {
            echo "<p>Localización no registrada</p>";
         } else {
            echo "<table class='tabla'>"
             ."<tr><th>Descripción</th><th>Latitud</th><th>Longitud</th></tr>"
             ."<tr><td id='place'>$respuesta->description</td><td>$respuesta->latitude</td><td>$respuesta->longitude</td></tr>"
             ."</table>";
         } 
       }
   ?>
   <!--Fin de Sección que muestra resultado de consulta de localización-------------------->
   <!--Sección donde se muestra el mapa---------------------------------------------------->
   <div id="divMap"></div>
   </section>
   <!--Fin de Sección donde se muestra el mapa---------------------------------------------------->
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="js/scripts.js"></script>
</body>
</html>