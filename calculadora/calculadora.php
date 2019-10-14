<?php
class App
{

    public function __construct()
    {
        session_start();
    }
    public function calculo()
    {
        $operando1 = $_POST['operando1'];
        $operando2 = $_POST['operando2'];
        $operador = $_POST['operador'];
        $solucion = 0;
        $valido = false;

        if (!is_numeric($operando1) || !is_numeric($operando2)){
            $_SESSION[$operando1]=$operando1;
            $_SESSION[$operando2]=$operando2;
            if(!is_numeric($operando1)&& is_numeric($operando2)){
                echo "El primer operando no es un numero";
            }else if(is_numeric($operando1)&& !is_numeric($operando2)){
                echo "El segundo operando no es un numero";
            }else if(!is_numeric($operando1) && !is_numeric($operando2)){
              echo "Ninguno de los dos son numeros";
            }
        }else {
            $valido = true;
          }

        if ($valido == true){
            if($operador == "+"){
                $solucion = $operando1 + $operando2;
            }else if($operador == "-"){
                $solucion = $operando1 - $operando2;
            }else if($operador == "*"){
                $solucion = $operando1 * $operando2;
            }else if($operador == "/"){
                $solucion = $operando1 / $operando2;
            }
            echo "<br>";
            echo "La solución es: ".$solucion;
            echo "<br>";
        } else{
            echo "<br>";
            echo "Ha habido un problema al hacer la operacion";
            echo "<br>";
        }
    }
}


$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'calculo';
}
if (method_exists($app, $method)) {
    $app->$method();
} else {
    exit('no encontrado');
}


?>


<form method="post" action="calculadora.php">
    <input type="text" name="operando1">
    <select name="operador">
        <option value="+">+
        </option>
        <option value="-">-
        </option>
        <option value="*">*
        </option>
        <option value="/">/
        </option>
    </select>
    <input type="text" name="operando2">
    <input type="submit" value="enviar">
</form>
