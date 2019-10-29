<?php
class App
{

    const FOLDERP = "imagenes/";
    function subirImagen()
    {

        $target_dir = "imagenes/"; // ubicacion donde va a gaurdar y leer imagenes
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadIsOk = 1; //booleano si ha subido
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen"]["tmp_name"]); // tmp_name es el nombre temporal
            if ($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadIsOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadIsOk = 0;
            } // con esto si es una imagen se subirá y sino no
        }


        if (file_exists($target_file)) { // si ya existe el archivo no se subira
            echo "Ya existe el archivo.";
            $uploadIsOk = 0;
        }


        if ($_FILES["imagen"]["size"] > 500000) { // controlar no subir imagen con gran tamaño
            echo "Imagen demasiado grande.";
            $uploadIsOk = 0;
        }


        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"  // filtro por tipos de imagen
        ) {
            echo "Solo se permiten: JPG,jpg,gif,png,bmp,jpeg.";
            $uploadIsOk = 0; // no deja subirlo si no es imagen
        }

        if ($uploadIsOk == 0) {
            echo "Su imagen no se ha subido"; // si la booleana de subir es 0 no se sube
        } else {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) { //sino la sube y manda a el metodo vergaleria
                header('Location: index.php?method=verGaleria');
                echo "La imagen " . basename($_FILES["imagen"]["name"]) . " ha sido subido.";
            } else {
                header('Location: index.php?method=verGaleria');
                echo "Hubo un error al subir la imagen"; //si falla lo pone
            }
        }
    }
    public function verGaleria()
    {
        $folder_path = 'imagenes/';

        $files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp,jpeg}", GLOB_BRACE);  //en la ubicacion que le hemos puesto en el path muestra aqulla que acaben en (JPG, etc)

        require('vista.php');
    }

    public function borrar()
    {
        $file = $_GET['file'];
        unlink($file);  //borrar la imagen
        header('location: .');
    }
    public function show()
    {
        $file = $_GET['file'];
        $stats = stat($file); //para confirmar el borrado
        require 'vistaborrado.php';
    }
}


$App = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'verGaleria';
}
$App->$method();
