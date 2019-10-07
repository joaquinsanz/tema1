
<?php
if(isset($_POST["enviar"])){
    setcookie('nombre', $_POST['nombre']);
    $nombre = $_POST['nombre'];
}
else{
    $nombre="";
}
?>

<html>
<body>

<form action="" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p><input type="submit" /></p>
</form>
</body>
</html>
