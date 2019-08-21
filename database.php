<?php
$server='localhost';
$username='cronosDarkness';
$password='Jesuscastro1998_';
$database='wakeUP';
//Hacemos la conexion a la base de datos, utilizando '$conn' como el objeto de la conexion
try 
{
    $conn=new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} 
//En caso de que la conexion falle nos enviara un mensaje de error
catch (PDOException $e) 
{
    die('Connection Failed:'.$e->getMessage());
}
?>