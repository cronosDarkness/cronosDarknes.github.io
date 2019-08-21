<?php
require 'database.php';
$idRutina=$_POST['idRutinas'];
$tipoRutina=$_POST['tipoRutina'];
$descripcionRutina=$_POST['descripcionRutina'];
$diaRutina=$_POST['diaRutina'];

 echo $sql="UPDATE rutinas set tipo='".$tipoRutina."', descripcion='".$descripcionRutina."', dia='".$diaRutina."'
FROM rutinas where idRutinas='".$idRutina."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
?>