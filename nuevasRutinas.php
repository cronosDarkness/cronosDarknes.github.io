<?php
require 'database.php';
  if (!empty($_POST['tipoRutina']) && !empty($_POST['descripcionRutina']) && !empty($_POST['diaRutina'])) 
  {
  $sql = "INSERT INTO rutinas (tipo, descripcion, dia) VALUES (:tipoRutina, :descripcionRutina, :diaRutina)";
  //ejecuta nuestra consulta de sql
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':tipoRutina', $_POST['tipoRutina']);
  $stmt->bindParam(':descripcionRutina', $_POST['descripcionRutina']);
  $stmt->bindParam(':diaRutina', $_POST['diaRutina']);
  if ($stmt->execute()) 
  {
    $message = 'Alimento creado satisfactoriamente';
  } 
  else 
  {
    $message = 'Error a crear el alimento';
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    
<?php 
require 'partials/tipoUsuario.php'
?>

<div id="contenido">
    <form class="registro"action="nuevasRutinas.php" method="POST">
    <h1>Nueva rutina</h1>
        <label>Tipo:</label>          <input name="tipoRutina" type="text" placeholder="Ingresa tu nombre">
        <label>Descripcion:</label>   <input name="descripcionRutina" type="text" placeholder="Ingresa tu apellido">
        <label>Día:</label>           <input name="diaRutina" type="text" placeholder="Ingresa tu correo">
        <input type='submit' value='Registrarse'>
    </form>
</div>
</body>
</html>