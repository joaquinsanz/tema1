<?php

class App
{

    public function __construct()
    {
        session_start();
    }
    public function vista(){
        require "vista.php";
    }

    public function toggle()
    {
      $numero = $_GET['number'];
        if(!isset($_SESSION['apuestas']))
        {
            $_SESSION['apuestas'] = array();
        }
        
        if(isset($_SESSION['apuesta'][$numero]))
        {
            unset($_SESSION['apuesta'][$numero]);
        }
        else
        {
            $_SESSION['apuesta'][$numero]=$numero;
        }
        $_SESSION['numerosSelecionados']=sizeof($_SESSION['apuesta']);
        
        header('Location: /loteria.php?method=vista');
    

    }
    public function flush(){
      if(sizeof($_SESSION['apuesta']) >= 6 )
      {
        array_push($_SESSION['apuestas'],$_SESSION['apuesta']);
        if(sizeof($_SESSION['apuesta']) == 6 ){ // if is es =6 una apuesta
            $_SESSION['mansaje'] = "Se ha realizado una apuesta.";
            unset($_SESSION['apuesta']);
        }
        else if(sizeof($_SESSION['apuesta']) > 6) // si mayor que 6 calcular
        {
            // metodo que hace el factorial de un numero
            function fact($numero)
            {
                $fact = 1;
                for($i=1;$i<=$numero;$i++)
                {
                    $fact = $fact*$i;
                }
                return $fact;
            }
            //calcular el numero de apuestas realizadas
            $numApt = sizeof($_SESSION['apuesta']);
            $nApuestas = fact($numApt) / (fact(6) * (fact($numApt - 6 ))); // utilizamos el método factorial aquí
            $_SESSION['mansaje'] = "Has realizado $nApuestas apuestas";
            unset($_SESSION['apuesta']); // borrado de la sesion
        }
      }
      else
      {
        $_SESSION['mansaje'] = "Error la apuesta debe tener selecionados al menos 6 números.";
      }
      header('Location: /loteria.php?method=vista');

    }


$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'vista';
}
if (method_exists($app, $method)) {
    $app->$method();
} else {
    exit('no encontrado');
}


?>
