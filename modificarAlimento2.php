<?php
require 'database.php';
$consulta=$_GET['id'];
$nombreAlimento=$_POST['nombreAlimento'];
$descripcionAlimento=$_POST['descripcionAlimento'];
$tipoAlimento=$_POST['tipoAlimento'];
$sql="UPDATE alimentos set nombre='".$nombreAlimento."', descripcion='".$descripcionAlimento."', tipo='".$tipoAlimento."'
FROM alimentos where idAlimento='".$consulta."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<script type="text/javascript">
alert("Alimento modificado correctamente");
window.location.href="index.php";
</script>