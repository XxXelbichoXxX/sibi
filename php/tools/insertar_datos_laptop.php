<?php
    include('../includes/utilerias.php');
    $claveEmpleado = validar($_POST['campo']);
    $claveArea = validar($_POST['claveArea']);
    $junta = validar($_POST['junta']);
    $modeloE = validar($_POST['modeloE']);
    $serieE = validar($_POST['serieE']);
    $numInvE = validar($_POST['numInvE']);
    $sistema = validar($_POST['sistema']);
    $procesador = validar($_POST['procesador']);
    $ram = validar($_POST['ram']);
    $dd = validar($_POST['dd']);
    $mac = validar($_POST['mac']);
    $ip = validar($_POST['ip']);
    $propiedad = validar($_POST['propiedad']);
    $perfil = validar($_POST['perfil']);
    $macD = validar($_POST['macD']);
    $serieD = validar($_POST['serieD']);




    $conexion = conectar();


    $sql = "INSERT INTO laptop (serie, nombreEmpleado, claveArea, junta, modelo, numInv, sistema, procesador, ram, dd, mac, ip, propiedad, perfil, MACD, serieD) values ('$serieE', '$claveEmpleado', '$claveArea', '$junta','$modeloE', '$numInvE', '$sistema', '$procesador', '$ram', '$dd', '$mac', '$ip', '$propiedad', '$perfil', '$macD', '$serieD')";


    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=laptop');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=laptop');
    }

    mysqli_close($conexion);
