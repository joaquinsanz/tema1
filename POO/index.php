<?php


class App {
    public $nombre;
    public $apellido;
    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    public static function poo()
    {
        echo "Ejemplo POO <br>";
    }
    public function saludar()
    {
        echo "Hola, me llamo $this->nombre";
        // this.nombre >>>>> this ->nombre
        // atributos y metodos del objeto:
        // $objeto -> atributo;
        // $objeto  -> metodo;
        //atributos de clase y funciones de clase : estaticas
        //Clase::atributoEstatico;
        //Clase::metodoEstatico();
        //Clase::constante;
    }
    public function vista()
    {
        require('vista.php');
    }
}

$app = new App ('Joaquin', 'Sanz');

if (isset($_GET['method'])){
    $method = $_GET['method'];
} else{
    $method = 'saludar';
}

// App::poo(); //metodo estatico
// $app -> saludar(); //metodo publico

if(method_exists($app, $method)){
    $app->$method();
} else{
    exit('3');
    die('404');
}
