<?php

class App
{

    public function __construct()
    {
        session_start();
    }

    function subirImagen($archivo, $dir, $conexion){     
        
        // Se comprueba que el archivo a subir sea una imagen.
        if($_FILES[$archivo]["type"] == "image/jpeg"){
            require(vista.php);    
            // Se comprueba si ha ocurrido algun error al subir el archivo.
            if ($_FILES[$archivo]["error"]) {
                echo '<div class="error">Error '.$_FILES["archivo"]["error"].'al intentar subir el archivo '.$_FILES[$archivo]["name"].'</div>';
            } else {
                // Se comprueba si ya se ha creado el subdirectorio para almacenar la imagen.
                // Y se crea si no existe aun.
                if(!is_dir("imagenes/".$dir)){
                    mkdir("imagenes/".$dir, 0755);
                }
    
                // Comprobamos que no haya ningun archivo con el mismo nombre en el servidor.
                if (file_exists("imagenes/".$dir."/".$_FILES[$archivo]["name"])) {
                    echo '<div class="error">Ya hay un archivo con nombre '.$_FILES[$archivo]["name"].'. Renombralo y vuelve a subirlo.</div>';   
                } else {
                    // Subimos la imagen.
                    move_uploaded_file($_FILES[$archivo]["tmp_name"], "imagenes/".$dir."/".$_FILES[$archivo]["name"]);
                    echo '<div class="subido">Archivo '.$_FILES[$archivo]["name"].' subido.</div>';
                                            
                    // Agregamos la imagen a la base de datos.
                    $consulta = sprintf("INSERT INTO galeriaimagenes (archivo, directorio) VALUES ('%s','%s')",          
                        $conexion->real_escape_string($_FILES[$archivo]["name"]),
                        $conexion->real_escape_string($dir)
                    );
                        
                    // Se ejecuta la consulta.
                    $conexion->query($consulta);
                }
            }
        } else {
            echo '<div class="error">'.$_FILES[$archivo]["name"].': Formato de archivo no permitido. </div>';
        }      
        
    }
    public function flush(){
      session_destroy();
      unset($_SESSION);
      header ("Location: /");
    }
    // falta el método para sacar el numero de fotos  V = n! / 6! (n-6!)


$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'subirImagen';
}
if (method_exists($app, $method)) {
    $app->$method();
} else {
    exit('no encontrado');
}






?>
