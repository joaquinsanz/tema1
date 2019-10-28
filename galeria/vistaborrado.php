<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrar</title>
</head>

<body>
    <div>
        <?php
        $fichero = substr($file, strlen(App::FOLDERP));
        echo "<img src='$file' />";
        echo "<br>";
        echo "Este es el nombre del fichero: $fichero";

        echo "<p>La imagen tiene este tamaño  $stats[size]</p>";

        $fecha = date('d-m-Y', $stats['mtime']);


        echo "<p>La imagen fue modificada por ultima vez el: $fecha";
        ?>


    </div>

    <div>
        <form action="index.php" method="get" enctype="multipart/form-data">

            <thead>
                <h3>Quiers borrar esta imagen?</h3>
                <input name="file" type="hidden" value="<?php echo $file ?>">
                <input name="method" type="hidden" value="delete">
            </thead>
            <input type="submit" name="Borra" value="Borrar">
        </form>
</body>

</html>