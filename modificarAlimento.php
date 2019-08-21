<?php
require 'database.php';
$consulta=$_GET['id'];
$sql="SELECT * FROM alimentos where idAlimento='".$consulta."'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
while($buscarAlimento=$stmt->fetch(PDO::FETCH_ASSOC))
{  
    $nombre=$buscarAlimento['nombre'];
    $descrip=$buscarAlimento['descripcion'];
    $tipo=$buscarAlimento['tipo'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modificar Alimento</title>
</head>
<body>
<?php 
require 'partials/tipoUsuario.php';
?>

<div id="contenido">
    <form class="registro"action="modificarAlimento2.php" method="POST">
    <h1>Modificar Alimento</h1>
        <input name="idAlimento" type="hidden" value=<?php echo $_GET['id'] ?>>
        <label>Nombre: </label>          <input name="nombreAlimento" type="text" value=<?php echo $nombre ?>>
        <label>Descripción:</label>      <input name="descripcionAlimento" type="text" value=<?php echo $descrip ?>>
        <label>Tipo:</label>             <input name="tipoAlimento" type="text" value=<?php echo $tipo ?>>
        <input type='submit' value='Actualizar'>
    </form>
</div>
</body>
</html>-