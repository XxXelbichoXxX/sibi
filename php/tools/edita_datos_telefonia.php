<?php
    include('../includes/utilerias.php');
    $claveEmpleado = validar($_POST['campo']);
    $claveArea = validar($_POST['claveArea']);
    $junta = validar($_POST['junta']);
    $extension = validar($_POST['extension']);
    $modelo = validar($_POST['modelo']);
    $serie = validar($_POST['serie']);
    $numInv = validar($_POST['numInv']);
    $mac = validar($_POST['mac']);
    $ip = validar($_POST['ip']);


    $conexion = conectar();


    $sql = "UPDATE telefonia SET serie = '$serie', nombreEmpleado = '$claveEmpleado', claveArea='$claveArea', junta='$junta', modelo='$modelo', numInv='$numInv', extension= '$extension', mac='$mac',ip='$ip' WHERE serie = '$serie'";



    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=telefonia');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=telefonia');
    }

    mysqli_close($conexion);
