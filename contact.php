<?php
require 'database.php';
$message = '';
//Verificamos que nuestros campos no esten vacios
if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono']) 
&& !empty($_POST['asunto']) && !empty($_POST['mensaje'])) {
  $sql = "INSERT INTO contacto (nombre,	correo,	telefono, asunto, mensaje) 
  VALUES (:nombre, :correo, :telefono, :asunto, :mensaje)";
  //ejecuta nuestra consulta de sql
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nombre', $_POST['nombre']);
  $stmt->bindParam(':correo', $_POST['correo']);
  $stmt->bindParam(':telefono', $_POST['telefono']);
  $stmt->bindParam(':asunto', $_POST['asunto']);
  $stmt->bindParam(':mensaje', $_POST['mensaje']);
  if ($stmt->execute()) 
  {
    $message = 'Mensaje entregado con exito';
  } 
  else 
  {
    $message = 'Error al ponerse en contacto.';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Contacto</title>
</head>
<body>

<?php 
require 'partials/tipoUsuario.php';
?>

<div id="contenido">
    <form class="registro"action="contact.php" method="POST">
    <h1>Registro</h1>
        <label>Nombre:</label>      <input name="nombre" type="text" placeholder="Nombre">
        <label>Correo:</label>      <input name="correo" type="text" placeholder="Correo">
        <label>Telefono:</label>    <input name="telefono" type="text" placeholder="Telefono">
        <label>Asunto:</label>      <input name="asunto" type="text" placeholder="asunto">
        <label>Mensaje:</label>     <input name="mensaje" type="text" placeholder="mensaje">
        <input type='submit' value='Registrarse'>
    </form>
</div>

</body>
</html>