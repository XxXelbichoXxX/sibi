<?php
    include('../includes/utilerias.php');
    $nombre = validar($_POST['nombre']);
    $area = validar($_POST['area']);
    $junta = validar($_POST['junta']);
    $cargo = validar($_POST['cargo']);
    $email = validar($_POST['email']);
    

  
    $user = crearUsuario(8);
    
    $conexion = conectar();



    $sql = "insert into empleado values ('$user','$area','$junta','$nombre', '$cargo','$email')";


    $resultado = mysqli_multi_query($conexion, $sql);

    if($resultado ){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=personal');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=personal');
    }

    mysqli_close($conexion);

?>