<?php
require 'database.php';
$message = '';
//Verificamos que nuestros campos no esten vacios
if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) 
&& !empty($_POST['contrasenia']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO usuarios (nombre,	apellido,	correo, contrasenia) 
  VALUES (:nombre, :apellido, :correo, :contrasenia)";
  //ejecuta nuestra consulta de sql
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nombre', $_POST['nombre']);
  $stmt->bindParam(':apellido', $_POST['apellido']);
  $stmt->bindParam(':correo', $_POST['correo']);
  $password = password_hash($_POST['contrasenia'], PASSWORD_BCRYPT);
  $stmt->bindParam(':contrasenia', $password);
  if ($stmt->execute()) 
  {
    $message = 'Successfully created new user';
  } 
  else 
  {
    $message = 'Sorry there must have been an issue creating your account';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>Registro</title>
</head>
<body>
<?php require 'partials/tipoUsuario.php' ?>
<?php if(!empty($message)): ?>
  <p> <?= $message ?> </p>
<?php endif ?>


<div id="contenido">
    <form class="registro"action="signup.php" method="POST">
    <h1>Registro</h1>
        <label>Nombre(s):</label>          <input name="nombre" type="text" placeholder="Ingresa tu nombre">
        <label>Apellido(s):</label>        <input name="apellido" type="text" placeholder="Ingresa tu apellido">
        <label>Correo:</label>             <input name="correo" type="text" placeholder="Ingresa tu correo">
        <label>Contraseña:</label>         <input name="contrasenia" type="password" placeholder="Ingresa tu contraseña">
        <label>Repetir Contraseña:</label> <input name="password" type="password" placeholder="Re-ingresa tu contraseña">
        <input type='submit' value='Registrarse'>
    </form>
</div>

</body>
</html>