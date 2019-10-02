<?php
var_dump($_REQUEST);

if (isset($_REQUEST ['lista'])){
    $lista = $_REQUEST ['lista'];
} else {
    $lista = array ();
    
}
if (isset($_REQUEST ['nuevo'])){
    $nuevo = $_REQUEST ['nuevo'];
    $lista[] = $nuevo;
}

require "prueba2vista.php";
?>