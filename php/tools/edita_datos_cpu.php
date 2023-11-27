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


    $sql = "UPDATE equipo SET serie='$serieE', nombreEmpleado='$clave', claveArea='$claveArea', junta='$junta', marca='$marcaE', modelo='$modeloE', numInv='$numInvE', sistema='$sistema', procesador='$procesador', ram='$ram', dd='$dd', mac='$mac', ip='$ip', conexion='$tConexion', propiedad='$propiedad' where serie = '$serieE'";

    $sql2 = "UPDATE bit_equipo SET serie = '$serieM', marca = '$marcaM', modelo = '$modeloM', numInv='$numInvM' WHERE serieE = '$serieE' AND tipo = 'Monitor'";
    $sql3 = "UPDATE bit_equipo SET serie = '$serieT', marca = '$marcaT', modelo = '$modeloT', numInv='$numInvT' WHERE serieE = '$serieE' AND tipo = 'Teclado'";
    $sql4 = "UPDATE bit_equipo SET serie = '$serieMo', marca = '$marcaMo', modelo = '$modeloMo', numInv='$numInvMo' where serieE = '$serieE' AND tipo = 'Mouse'";

    $resultado = mysqli_query($conexion, $sql);
    $resultado2 = mysqli_query($conexion, $sql2);
    $resultado3 = mysqli_query($conexion, $sql3);
    $resultado4 = mysqli_query($conexion, $sql4);

    if($resultado and $resultado2 and  $resultado3 and  $resultado4){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=cpu');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=cpu');
    }

    mysqli_close($conexion);
