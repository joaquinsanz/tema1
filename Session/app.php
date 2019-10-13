<?php


class App
{

    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        require("login_vista.php");
    }

    public function auth()
    {
        if (empty($_POST['nombre'])) {
            header('Location: /Session/app.php?method=login');
        } else {
            $_SESSION["nombre"] = $_POST['nombre'];
            header('Location: /Session/app.php?method=home');
        }
    }
    public function home()
    {
        if (isset($_REQUEST ['lista'])){
            $lista = $_REQUEST ['lista'];
        } else {
            $lista = array ();
            
        }
        if (isset($_REQUEST ['deseo'])){
            $deseo = $_REQUEST ['deseo'];
            $lista[] = $deseo;
        }
        
        require("home_vista.php");

    }
    
    public function new()
    {
        $lista = $_SESSION ['lista'];
        $lista[] = $deseo;
        $_SESSION['lista'] = $lista;
    }
    public function delete(){
        if (isset($_GET[$key])){
            unset($_SESSION['lista'][$key]);
            header ('Location: /Session/app.php?metod=home');
        }
    }

    public function deleteAll(){
        
        unset($_SESSION['lista']);
        header ('Location: /Session/app.php?metod=home');
        
    }
    
}

$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'home';
}
if (method_exists($app, $method)) {
    $app->$method();
} else {
    exit('no encontrado');
}
