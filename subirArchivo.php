<?php
  //PARA PODER SUBIR ARCHIVOS A UNA CARPETA HAY QUE DARLE TODOS LOS PERMISOS A LA CARPETA
//recibimos el titulo de nuestra imagen
$message='';
$titulo=$_POST['nombreAlimento'];
$nombreArchivo=$_FILES['laimagen']['name'];
$ruta_temporal=$_FILES['laimagen']['tmp_name'];

//sirve para separarar 
$soloElNombre=explode('.',$nombreArchivo);
//cambia los valores a minusculas
//nos trae el ultimo indice del arreglo, el cual es la extension
$laExtension=strtolower(end($soloElNombre));
$extencionesValidas=array('jpg','gif');
//verifica si el valor esta dentro del array
if(in_array($laExtension,$extencionesValidas))
{
$directorio='imagenes/';
$nuevoNombreArchivo=$titulo.".".$laExtension;
$rutaDestino=$directorio.$nuevoNombreArchivo;
if(move_uploaded_file($ruta_temporal,$rutaDestino))
{
    require 'nuevoAlimento.php';
    $message="Creado correctamente";
}
else
    $message = 'Error a cagar el archivo';    
}
else
{
    $message = 'Tipo de archivo no valido';
}
?>