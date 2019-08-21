<?php
require 'database.php';
$consulta=$_GET['id'];
$sql="SELECT * FROM rutinas where idRutinas='".$consulta."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
while($buscarAlimento=$stmt->fetch(PDO::FETCH_ASSOC))
{  
    $tipo=$buscarAlimento['tipo'];
    $descripcion=$buscarAlimento['descripcion'];
    $dia=$buscarAlimento['dia'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modificar Rutina</title>
</head>
<body>
<?php 
require 'partials/tipoUsuario.php';
?>

<div id="contenido">
    <form class="registro"action="modificarRutinas2.php" method="POST">
    <h1>Modificar Rutina</h1>
        <input name="idRutinas" type="hidden" value=<?php echo $_GET['id'] ?>>
        <label>Tipo: </label>          <input name="tipoRutina" type="text" value=<?php echo $tipo ?>>
        <label>Descripción:</label>    <input name="descripcionRutina" type="text" value=<?php echo $descripcion ?>>
        <label>Día</label>             <input name="diaRutina" type="text" value=<?php echo $dia ?>>
        <input type='submit' value='Actualizar'>
    </form>
</div>
</body>
</html>