<?php
class App
{


    function subirImagen()
    {

        $target_dir = "imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen1"]["name"]);
        $uploadIsOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen1"]["tmp_name"]);
            if ($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadIsOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadIsOk = 0;
            }
        }


        if (file_exists($target_file)) {
            echo "Ya existe el archivo.";
            $uploadOk = 0;
        }


        if ($_FILES["imagen1"]["size"] > 500000) {
            echo "Imagen demasiado grande.";
            $uploadOk = 0;
        }


        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Solo se permiten: JPG,jpg,gif,png,bmp,jpeg.";
            $uploadIsOk = 0;
        }

        if ($uploadIsOk == 0) {
            echo "Su imagen no se ha subido";
        } else {
            if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $target_file)) {
                header('Location: index.php?method=verGaleria');
                echo "La imagen " . basename($_FILES["imagen1"]["name"]) . " ha sido subido.";
            } else {
                header('Location: index.php?method=verGaleria');
                echo "Hubo un error al subir la imagen";
            }
        }
    }
    public function verGaleria()
    {
        $folder_path = 'imagenes/';

        $files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp,jpeg}", GLOB_BRACE);

        require('vista.php');
    }

    public function borrar()
    {
        $file = $_GET['file'];
        filedelete[$file];
        header('location: .');
    }
}


$App = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'verGaleria';
}
$App->$method();
