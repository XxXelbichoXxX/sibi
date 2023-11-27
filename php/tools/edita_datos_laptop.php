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


    $sql = "UPDATE laptop SET serie='$serieE', nombreEmpleado='$claveEmpleado', claveArea='$claveArea', junta='$junta', marca='LENOVO', modelo='$modeloE', numInv='$numInvE', sistema='$sistema', procesador='$procesador', ram='$ram', dd='$dd', mac='$mac', ip='$ip', propiedad='$propiedad', perfil='$perfil', MACD='$macD', serieD='$serieD' where serie = '$serieE'";


    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=laptop');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=laptop');
    }

    mysqli_close($conexion);