<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <h1>Lista Deseos</h1>
    <ul>
        <?php
        foreach ($lista as $key => $deseo){
            echo"<li>" . $deseo . "</li>";
            echo "<li>" . "<a href ='/Session/app.php?metod=delete'>" .  " eliminar" . "</a>" . "</li>";
            
        }
        echo "<button>" . "<a href ='/Session/app.php?metod=deleteAll'>" .  " eliminar todo" . "</a>" . "</button>";
        ?>
        
    </ul>
    <h1>Nuevo deseo</h1>
    <form action="app.php?method=home" method ="get"> 
        <?php
        foreach ($lista as $key => $deseo){
            echo '<input type="hidden" name= "lista[]" value=' . $deseo . '>';
        }
        ?>
        <label for="deseo"> Nuevo deseo: </label>
        <input type ="text" value="" name="deseo"/>
        <br>
        <input type="submit"/>
    </form>
</body>
</html>