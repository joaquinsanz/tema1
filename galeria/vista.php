<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Galeria</title>
</head>

<body>
    <div>
        <table>
            <tr>
                <?php
                foreach ($files as $file) {
                    echo "<td><a href='?method=show&file=$file' ><img src='$file' /></a></td> ";
                }
                ?></tr>
        </table>

    </div>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <table id="formularioSubida" border="0">
            <thead>
                <th>Elige los archivos que quieras subir</th>
            </thead>
            <tr>
                <td>
                    <div>
                        <input name="imagen" type="file">
                    </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="botonSubir" value="Subir">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>