
<?php
if(isset($_POST["enviar"])){
$nombre = $_POST["nombre"];
setcookie("nombre_cookie", $nombre, time() + 3600);
echo "Hola ". $_POST [nombre]
?>

<html>
<body>
<?php


?>
<form action="" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p><input type="submit" /></p>
</form>
</body>
</html>
