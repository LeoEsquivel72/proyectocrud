<?php
$host="localhost";
$user="WEB";
$password="Viva_GNU_2024";
$dbname="Usuario_WEB";

$conexion=new mysqli($host, $user, $password, $dbname);

if ($conexion->conect_error){
	die("conexionexion fallida: " . $conexion->conect_error);
} 




?>

