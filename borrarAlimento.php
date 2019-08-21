<?php
require 'database.php';
$consulta=$_GET['id'];
$sql="DELETE FROM alimentos where idAlimento='".$consulta."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<script type="text/javascript">
alert("Alimento eliminado correctamente");
window.location.href="index.php";
</script>
