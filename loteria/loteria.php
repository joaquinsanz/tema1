<?php

class App
{

    public function __construct()
    {
        session_start();
    }

    public function toggle()
    {
      require("vista.php");
      $apuesta = $_GET['number'];
      $cantidadApuestas = 0;
      $lista = $_SESSION ['lista'];
      $lista[] = $apuesta;
      $_SESSION['lista'] = $lista;

      if (isset($_REQUEST ['lista'])){

        $lista = $_REQUEST ['lista'];

      } else {

        $lista = array ();

      }

      if (isset($_REQUEST ['number'])){
        $apuesta = $_REQUEST ['number'];
        $lista[] = $apuesta;

      }

      for ($cantidadApuestas = 0 ; $cantidadApuestas <= $apuesta.size(); $cantidadApuestas++){
          $cantidadApuestas ++;

      }



      echo "<br>";
      echo "Llevas " . $cantidadApuestas . " apuestas.";
      echo "<br>";
    }
    public function flush(){
      session_destroy();
      unset($_SESSION);
      header ("Location: /");
    }
    // falta el método para sacar el numero de apuestas  V = n! / 6! (n-6!)


$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'toggle';
}
if (method_exists($app, $method)) {
    $app->$method();
} else {
    exit('no encontrado');
}






?>
