<?php

class App
{

    public function __construct()
    {
        session_start();
    }

    public function toggle()
    {
      $numero = $_GET['number'];
        if(!isset($_SESSION['apuestaAlmacen']))
        {
            $_SESSION['apuestaAlmacen'] = array();
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
        
        header('Location: /loteria/vista.php');
    

    }
    public function flush(){
      if(sizeof($_SESSION['apuesta']) >= 6 )
      {
        array_push($_SESSION['apuestaAlmacen'],$_SESSION['apuesta']);
        if(sizeof($_SESSION['apuesta']) == 6 ){
            $numeroApuesta = 1;
            $_SESSION['message2'] = "Se ha realizado una apuesta.";
            unset($_SESSION['apuesta']);
        }
        else if(sizeof($_SESSION['apuesta']) > 6)
        {
            
            function fact($numero)
            {
                $fact = 1;
                for($i=1;$i<=$numero;$i++)
                {
                    $fact = $fact*$i;
                }
                return $fact;
            }
            $numApt = sizeof($_SESSION['apuesta']);
             // falta el método para sacar el numero de apuestas  V = n! / 6! (n-6!)
            $n_apuestas = fact($numApt) / (fact(6) * (fact($numApt - 6 )));
            $_SESSION['message2'] = "Has realizado $n_apuestas número de apuestas";
            unset($_SESSION['apuesta']);
        }
      }
      else
      {
        $_SESSION['message2'] = "Error la apuesta debe tener selecionados por lo mínimo 6 números.";
      }
      header('Location: /loteria/vista.php');

    }



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
