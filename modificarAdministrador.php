<?php
require 'database.php';
$consulta=$_GET['id'];
$sql="UPDATE usuarios set tipo=administrador FROM usuarios where id='".$consulta."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
?>