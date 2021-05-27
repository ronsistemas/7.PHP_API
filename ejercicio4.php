<?php
   //API's utilizadas
   //weather-api 
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 4</title>
   <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
   <section class="container">
   <form action="" method="GET" name="">
      <fieldset>
         <label for="location">Seleccione ciudad</label>
         <select name="location">
            <option value="Paris">Paris</option>
            <option value="Granada">Granada</option>
            <option value="Roma">Roma</option>
            <option value="Tokyo">Tokyo</option>
         </select>
         <input type="submit" value="Consultar" name="btnConsultartiempo">
      </fieldset>
   </form>
   </section>

   <?php
      include_once('include/functions.inc.php');
      if(isset($_GET['btnConsultartiempo'])) {
         //Consulta a primera API (weather-api)--------------------------------------------------
         $url = 'https://goweather.herokuapp.com/weather/='.$_GET['location'];

         $resultado1 = json_decode(get($url));
                  
         //Consulta a segunda API (metaweather) --------------------------------------
         //Primera interacción --Se recupera el código de localización
/*       $url = 'https://www.metaweather.com/api/location/search/?query='.$_GET['location'];
         $resultado = json_decode(get($url));
         
         if(is_array($resultado) && !empty($resultado)) {
            $locationPlace = $resultado[0]->woeid;
            $locationPlace = str_replace(' ','',$locationPlace);
            //Segunda interacción --Se recuperan los datos de tiempo de "localización con el código obtenido anteriormente
            $url = "https://metaweather.com/es/$locationPlace/";
            $resultado = json_decode(get($url));
            echo "<pre>";
            var_dump($resultado);
            echo "</pre>";
         } */

          /**
          * showTime
          *
          * @param  mixed $resultado
          * @return void
          */
         function showTime($resultado1) {
            echo "<table>"
            ."<tr><th>Temperatura</th><td>$resultado1->temperature</td></tr>"
            ."<tr><th>Viento</th><td>$resultado1->wind</td></tr>"
            ."<tr><th>Descripción</th><td>$resultado1->description</td></tr>"
            ."</table>";
           }

         echo "<h3 id='place'>".$_GET['location']."</h3>";
           
         //Se comprueba si existe mensaje de respuesta de la API ('NOT FOUND')
         //Si por cualquier motivo no estuviera disponible la localización a través de la API 'weather-api'
         //se intenta acceder por la alternativa ---NO IMPLEMENTADO POR ERRORES EN API ---Seguiremos investigando
         if(!isset($resultado1->message)) {
            showTime($resultado1);
        } else {
           echo "<p>Localización no registrada</p>";
        }
      }
   ?>
      <script src="js/scripts.js"></script>
</body>
</html>