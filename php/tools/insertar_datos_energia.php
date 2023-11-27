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
    $propiedad = validar($_POST['propiedad']);


    $conexion = conectar();


    $sql = "INSERT INTO ups (serie, tipo, nombreEmpleado, claveArea, junta, marca, modelo, numInv, mac, ip, propiedad) values ('$serie','$tipo', '$claveEmpleado', '$claveArea', '$junta', '$marca', '$modelo', '$numInv', '$mac','$ip','$propiedad')";



    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=energia');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=energia');
    }

    mysqli_close($conexion);
