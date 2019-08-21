<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>Buscar alimento</title>
</head>
<body>
<header>
<?php 
require 'partials/tipoUsuario.php';
?>
</header>
<div id="contenido">
    <form class="registro" action="buscarAlimento.php" method="POST">
    <h1>Buscar alimento</h1>
        <label>Tipo de alimento:</label> <input name="tipoAlimento" type="text" placeholder="Buscar Alimento">
        <input type='submit' value='Buscar'>
    </form>
</div>

<?php
$tipoAlimento=$_POST['tipoAlimento'];
$sql="SELECT * FROM alimentos where tipo='$tipoAlimento'";
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
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Tipo</th>
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
        <td>".$buscarAlimento['idAlimento']."</td>
        <td>".$buscarAlimento['nombre']."</td>
        <td>".$buscarAlimento['descripcion']."</td>
        <td>".$buscarAlimento['tipo']."</td>
        <td>
        <a href=\"modificarAlimento.php?id=".$buscarAlimento['idAlimento']."\"><button type=\"button\" class=\"btn btn-success\">Modificar</button></a>
        <br>
        <br>
        <a href=\"borrarAlimento.php?id=".$buscarAlimento['idAlimento']."\"><button type=\"button\" class=\"btn btn-success\">Eliminar</button></a>
        </td>
    </tr> 
    </table>
</div>
    ";
}
?>
</body>
</html>