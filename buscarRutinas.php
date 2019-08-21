<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
    <title>buscar Rutinas</title>
</head>
<body>

<header>
<?php 
require 'partials/tipoUsuario.php';
?>

</header>
<div id="contenido">
    <form class="registro" action="buscarRutinas.php" method="POST">
    <h1>Buscar Rutinas</h1>
        <label>Tipo de rutina:</label> <input name="tipoRutina" type="text" placeholder="Buscar tipo de rutina">
        <input type='submit' value='Buscar'>
    </form>
</div>

<?php
$tipoRutina=$_POST['tipoRutina'];
$sql="SELECT * FROM rutinas where tipo='$tipoRutina'";
$stmt = $conn->query($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
echo 
    "
    <div id=\"calendarioPrincipiante\">
    <table class=\"calendarioPrincipiantes\">
    <br>
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Día</th>
        <th>Accion</th>
    </tr>
    ";
while($buscarAlimento=$stmt->fetch())
{
    echo 
    "
    <div id=\"calendarioPrincipiante\">
    <table class=\"calendarioPrincipiantes\">
    <tr>
        <td>".$buscarAlimento['idRutinas']."</td>
        <td>".$buscarAlimento['tipo']."</td>
        <td>".$buscarAlimento['descripcion']."</td>
        <td>".$buscarAlimento['dia']."</td>
        <td>
        <a href=\"modificarRutina.php?id=".$buscarAlimento['idRutinas']."\"><button type=\"button\" class=\"btn btn-success\">Modificar</button></a>
        <br>
        <br>
        <a href=\"borrarRutina.php?id=".$buscarAlimento['idRutinas']."\"><button type=\"button\" class=\"btn btn-success\">Eliminar</button></a>
        </td>
    </tr> 
    </table>
</div>
    ";
}
?>
</body>
</html>