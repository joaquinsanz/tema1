<?php


class App {

    
    public function Formulario(){
        
        if (isset($_COOKIE['nombre'])){
            $nombre = $_COOKIE['nombre'];
            
        }else{
            $nombre="";
        }
        require("vista.php");
    }
    public function Respuesta() {


        if (isset($_POST ['nombre'])){
            $nombre = $_POST ['nombre'];
            setcookie('nombre', $nombre, time() + 3600);
            echo "Hola".$_POST['nombre'];
        }else{
            echo 'No hay nombre';
        }

    }

}
$app = new App ();
if (isset($_GET['method'])){
    $method = $_GET['method'];
} else{
    $method = 'Formulario';
}
if (method_exists($app, $method)){
    $app->$method();
}else{
    exit ('no encontrado');
}
