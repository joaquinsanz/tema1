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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista Jugadores</h1>
    <ul>
        <?php
        foreach ($lista as $key => $jugador){
            echo"<li>" . $jugador . "</li>";
        }
        ?>
    </ul>
    <h1>Nuevo Juegador</h1>
    <form action="" method ="get"> 
        <?php
        foreach ($lista as $key => $jugador){
            echo '<input type="hidden" name= "lista[]" value=' . $jugador . '>';
        }
        ?>
        <label for="nuevo"> Nuevo Jugador: </label>
        <input type ="text" value="" name="nuevo"/>
        <br>
        <input type="submit"/>
    </form>
</body>
</html>