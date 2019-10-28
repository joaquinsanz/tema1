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
      for ($i = 1; $i <= 49; $i++) {
        if ($_SESSION['apuesta'][$i] == $i) {
          echo "<td class='selected' ><a  href=\"?method=toggle&number=$i\">$i</a></td>";
        } else {
          echo "<td class='unselected'><a href=\"?method=toggle&number=$i\">$i</a></td>";
        }
        if ($i % 7 == 0) {
          echo "</tr><tr>";
        }
      }
      ?>
    </tr>
  </table>

  <?php
  if ($_SESSION['numerosSelecionados'] >= 1 && $_SESSION['numerosSelecionados'] < 6) {
    echo "Apuesta incompleta, usted lleva $_SESSION[numerosSelecionados] número selecionados.";
  } else if ($_SESSION['numerosSelecionados'] == 6) {
    echo "Apuesta completa.Pulsa Guardar.";
  } else if ($_SESSION['numerosSelecionados'] > 6) {
    echo "Apuesta múltiple completa, usted lleva $_SESSION[numerosSelecionados] número selecionados.";
  }
  ?>

  <br />

  <form action="?method=flush" method="post">
    <br />
    <button type="submit">Guardar Apuesta</button>
  </form>

  <?php
  echo "<br/>";
  echo "$_SESSION[message2]";
  ?>

</body>

</html>