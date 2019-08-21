<?php
require 'database.php';
  if (!empty($_POST['nombreAlimento']) && !empty($_POST['descripcionAlimento']) && !empty($_POST['tipoAlimento'])) 
  {
  $sql = "INSERT INTO alimentos (nombre, descripcion, tipo) VALUES (:nombre, :descripcion, :tipo)";
  //ejecuta nuestra consulta de sql
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nombre', $_POST['nombreAlimento']);
  $stmt->bindParam(':descripcion', $_POST['descripcionAlimento']);
  $stmt->bindParam(':tipo', $_POST['tipoAlimento']);
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
<title>Nuevo alimento</title>
</head>
<body>

<?php 
require 'partials/tipoUsuario.php'
?>

<div id="contenido">
    <form class="registro" action="subirArchivo.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <h1>nuevo Alimento</h1>
        <label>Nombre:</label>             <input class="form-control" name="nombreAlimento" type="text" placeholder="Nombre del alimento">
        <label>Descripción:</label>        <input name="descripcionAlimento" type="text" placeholder="Descripción del alimento">
        <label>Tipo:</label>        <input name="tipoAlimento" type="text" placeholder="Ejemplo: Desayuno, Medio día, Almuerzo, Merienda, Cena">
       <input type="file" name="laimagen" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Nuevo Alimento</button>
        </div>
    </form>
    </div>
</form>
</div>

</body>
</html>