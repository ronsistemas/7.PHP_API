<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 1</title>
</head>

<body>

   <form action="" method="POST" name="form1">
      <p>
         <label for="code">Introduzca código fuente</label>
         <textarea name="code" id="code" cols="50" maxlength="400" rows="8" wrap="hard"></textarea>
      </p>
      <p>
         <label for="lexer">Lenguajes</label>
         <select name="lexer" id="lexer">
            <option value="php">PHP</option>
            <option value="javascript">Javascript</option>
            <option value="java">Java</option>
         </select>
      </p>
      <!-- <button type="button" name="btn" id="btn">Enviar</button> -->
      <input type="submit" name="btn" value="Enviar">
   </form>
   <hr>
   <?php
   include_once('include/functions.inc.php');
   if (isset($_POST['btn'])) {
      $code = $_POST['code'];
      $lexer = $_POST['lexer'];

      echo post(
         'http://hilite.me/api',
         [
            'code' => $code, 
            'lexer' => $lexer
         ]
      );
   }
   ?>

</body>

</html>