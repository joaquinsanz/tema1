<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Galeria</title>
</head>

<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <table id="formularioSubida" border="0">
            <thead>
                <th>Elige los archivos que quieras subir</th>
            </thead>
            <tr>
                <td>
                    <div class="inputImagenModificado">
                        <input class="inputImagenOculto" name="imagen1" type="file">
                        <div class="inputParaMostrar">
                            <input>
                            <img src="imagenes/button_select2.gif">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" id="botonAnadir" onClick="agregarFila('formularioSubida','botonAnnadir')" value="Añadir archivo" style="width:138px;">
                    <input type="submit" name="botonSubir" value="Subir">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>