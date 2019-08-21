<?php
  session_start();
  if (isset($_SESSION['user_id'])) 
  {
    header('Location: /wake-up');
  }

  require 'database.php';

  if (!empty($_POST['correo']) && !empty($_POST['contrasenia']))
  {
    $records = $conn->prepare('SELECT id,correo,contrasenia FROM usuarios WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['contrasenia'], $results['contrasenia'])) 
    {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /wake-up");
    }
    else 
    {
      $message = 'Lo siento, la informacion ingresada es incorrecta';
    }
  }
?>






<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>Login</title>
</head>
<body>
<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
  <p> <?= $message ?> </p>
<?php endif ?>

    <div id="contenido">
        <form class="registro" action="login.php" method="POST">
            <label>Usuario</label>          <input name="correo" type="text" placeholder="Ingresa tu correo">
            <label>Contraseña:</label>      <input name="contrasenia" type="password" placeholder="Ingresa tu contraseña">
            <input type='submit' value='Registrarse'>
        </form>
    </div>
</body>
</html>