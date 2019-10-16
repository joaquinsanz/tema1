<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>lotería</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <div class="tabla">
      <?php
        echo "<table>";
        echo "<tr>";
        for($number = 1; $number <= 49 ; $number ++){
          echo "<td><a href=\"?method=toggle&number=" .$number . "\"" . ">" . $number "</a> </td>" ;
          if ($number % 7 == 0) {
            echo "</tr>";
            echo "<tr>";
          }
        }
        echo "</tr>";
        echo "</table>";

       ?>
    </div>
  </body>
</html>
