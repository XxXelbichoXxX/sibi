<?php
include('../includes/utilerias.php');
$claveEmpleado = validar($_POST['campo']);
$claveArea = validar($_POST['claveArea']);
$junta = validar($_POST['junta']);
$tipo = validar($_POST['tipo']);
$marca = validar($_POST['marca']);
$modelo = validar($_POST['modelo']);
$serie = validar($_POST['serie']);
$numInv = validar($_POST['numInv']);
$mac = validar($_POST['mac']);
$ip = validar($_POST['ip']);

$conexion = conectar();


$sql = "INSERT INTO impsca (serie, tipo, nombreEmpleado, claveArea, junta, marca, modelo, numInv, mac, ip) values ('$serie','$tipo', '$claveEmpleado', '$claveArea', '$junta', '$marca', '$modelo', '$numInv', '$mac','$ip')";



$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    redireccionar('Datos guardados exitósamente', '../inventario.php?inv=impresora');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), '../inventario.php?inv=impresora');
}

mysqli_close($conexion);
