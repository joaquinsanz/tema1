
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
   
    <h1>Nombre</h1>
    <form action="app.php?method=auth" method ="post"> 
        <label for="nombre"> Nombre: </label>
        <input type ="text" name="nombre" value="<?php echo  $nombre?>" />
        <input type="submit"/>
    </form>
</body>
</html>