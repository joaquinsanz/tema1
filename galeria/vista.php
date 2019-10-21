HomeJavaScriptJQueryComo hacer una galería de imágenes en PHP
COMO HACER UNA GALERÍA DE IMÁGENES EN PHPCSS HTML JavaScript JQuery MySQL PHP  8 noviembre, 2012  59  Iván Salas 
Con PHP se puede hacer una galería de imágenes muy fácilmente y con un CSS le daremos un poco de estilo para que la galería sea más bonita y con lightbox mostraremos las imágenes.

El proceso para hacer la galería de imágenes se puede separar en dos apartados, subir las imágenes y mostrar las imágenes.

COMO SUBIR LAS IMAGENES PARA LA GALERIA
Para subir las imágenes lo primero es crear un formulario para elegir las imágenes que se quieran subir. Vamos con ello.


<form action="index.php" method="POST">
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
                <input type="button" id="botonAnnadir" onClick="agregarFila('formularioSubida','botonAnnadir')" value="Añadir archivo" style="width:138px;">        
                <input type="submit" name="botonSubir" value="Subir"> 
            </td>
        </tr>
    </table>
</form>