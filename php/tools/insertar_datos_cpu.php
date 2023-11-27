<?php
include('../includes/utilerias.php');
$clave = validar($_POST['campo']);
$claveArea = validar($_POST['claveArea']);
$junta = validar($_POST['junta']);
$marcaE = validar($_POST['marcaE']);
$modeloE = validar($_POST['modeloE']);
$serieE = validar($_POST['serieE']);
$numInvE = validar($_POST['numInvE']);
$sistema = validar($_POST['sistema']);
$procesador = validar($_POST['procesador']);
$ram = validar($_POST['ram']);
$dd = validar($_POST['dd']);
$mac = validar($_POST['mac']);
$ip = validar($_POST['ip']);
$tConexion = validar($_POST['conexion']);
$propiedad = validar($_POST['propiedad']);
$marcaM = validar($_POST['marcaM']);
$modeloM = validar($_POST['modeloM']);
$serieM = validar($_POST['serieM']);
$numInvM = validar($_POST['numInvM']);
$marcaT = validar($_POST['marcaT']);
$modeloT = validar($_POST['modeloT']);
$serieT = validar($_POST['serieT']);
$numInvT = validar($_POST['numInvT']);
$marcaMo = validar($_POST['marcaMo']);
$modeloMo = validar($_POST['modeloMo']);
$serieMo = validar($_POST['serieMo']);
$numInvMo = validar($_POST['numInvMo']);

$conexion = conectar();




$sql = "INSERT INTO equipo (serie, nombreEmpleado, claveArea, junta, marca, modelo, numInv, sistema, procesador, ram, dd, mac, ip, conexion, perfil, propiedad) values ('$serieE', '$clave', '$claveArea', '$junta', '$marcaE', '$modeloE', '$numInvE', '$sistema', '$procesador', '$ram', '$dd', '$mac', '$ip', '$tConexion','PERFIL B', '$propiedad')";

$sql2 = "insert into bit_equipo values ('$serieM','$serieE','Monitor','$marcaM','$modeloM','$numInvM'),('$serieT','$serieE','Teclado','$marcaT','$modeloT','$numInvT'),('$serieMo','$serieE','Mouse','$marcaMo','$modeloMo','$numInvMo')";


$resultado = mysqli_query($conexion, $sql);
$resultado2 = mysqli_query($conexion, $sql2);

if ($resultado) {
    redireccionar('Datos guardados exitósamente', '../inventario.php?inv=cpu');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), '../inventario.php?inv=cpu');
}

mysqli_close($conexion);
