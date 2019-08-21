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
    <form class="registro" action="nuevoAdministrador.php" method="POST">
    <h1>Nuevo administrador</h1>
    <br>
        <input type='submit' value='Buscar'>
    </form>
</div>

<?php
$sql="SELECT * FROM usuarios";
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
        <th>Apellido</th>
        <th>Correo</th>
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
        <td>".$buscarAlimento['id']."</td>
        <td>".$buscarAlimento['nombre']."</td>
        <td>".$buscarAlimento['apellido']."</td>
        <td>".$buscarAlimento['correo']."</td>
        <td>".$buscarAlimento['tipo']."</td>
        <td>
        <a href=\"modificarAdministrador.php?id=".$buscarAlimento['id']."\"><button type=\"button\" class=\"btn btn-success\">Modificar</button></a>
    </tr> 
    </table>
</div>
    ";
}
?>
</body>
</html>