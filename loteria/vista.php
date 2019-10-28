<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>lotería</title>
  <link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
  <table id="loteria">
    <tr>
      <?php
      for ($i = 1; $i <= 49; $i++) {  // for que crea la tabla de lotería
        if ($_SESSION['apuesta'][$i] == $i) {
          echo "<td class='seleccionado' ><a  href=\"?method=toggle&number=$i\">$i</a></td>";
        } else {
          echo "<td class='noseleccionado'><a href=\"?method=toggle&number=$i\">$i</a></td>";
        }
        if ($i % 7 == 0) {
          echo "</tr><tr>";
        }
      }
      ?>
    </tr>
  </table>

  <?php // muestra un mensaje en relación a los numeros que estan seleccionados
  if ($_SESSION['numerosSelecionados'] >= 1 && $_SESSION['numerosSelecionados'] < 6) {
    echo "Apuesta no completa, llevas $_SESSION[numerosSelecionados] número/s selecionados.";
  } else if ($_SESSION['numerosSelecionados'] == 6) {
    echo "Apuesta completa.";
  } else if ($_SESSION['numerosSelecionados'] > 6) {
    echo "Apuesta múltiple, llevas $_SESSION[numerosSelecionados] número/s selecionados.";
  }
  ?>

  <br />

  <form action="?method=flush" method="post">
    <!-- envia el formulario para guardarlo -->
    <br />
    <button type="submit">Guardar Apuesta</button>
  </form>

  <?php
  echo "<br/>";
  echo "$_SESSION[mensaje]";
  ?>

</body>

</html>