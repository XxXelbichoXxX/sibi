<?php
    include('../includes/utilerias.php');
    $claveEmpleado=validar($_POST['claveEmpleado']);
    $nombreEmpleado=validar($_POST['nombre']);
    $claveArea=validar($_POST['area']);
    $junta=validar($_POST['junta']);
    $cargo=validar($_POST['cargo']);
    $correo=validar($_POST['email']);

    $conexion = conectar();

    $sql = "update empleado set claveArea='$claveArea', junta='$junta',nombreEmpleado='$nombreEmpleado',cargo='$cargo',correo='$correo' where claveEmpleado='$claveEmpleado'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../inventario.php?inv=personal');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=personal');
    }

    mysqli_close($conexion);

?>