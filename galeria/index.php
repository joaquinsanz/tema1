<?php
class App{
    
       
    function subirImagen(){     
        
        $target_dir = "imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen1"]["name"]);
        $uploadIsOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen1"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadIsOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imagen1"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadIsOk = 0;
        }
        
        if ($uploadIsOk == 0) {
            echo "Sorry, your file was not uploaded.";
        
        } else {
            if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $target_file)) {
                header('Location: index.php?method=verGaleria');
                echo "La imagen ". basename( $_FILES["imagen1"]["name"]). " ha sido subido.";
            } else {
                header('Location: index.php?method=verGaleria');
                echo "Sorry, there was an error uploading your file.";
            }
        }
       
    }
    public function verGaleria()
    {
        $folder_path = 'imagenes/'; 
        
        $files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp,jpeg}", GLOB_BRACE);
        
        require('vista.php');
    }
}
    
    
$App = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'verGaleria';
}
$App->$method();
