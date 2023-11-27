<?php
    include('../includes/utilerias.php');
    $conexion = conectar();

    $claveEmpleado=$_GET['id'];

    $sql = "delete from empleado where claveEmpleado='$claveEmpleado'";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        redireccionar('Datos eliminados exitósamente','../inventario.php?inv=personal');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=personal');
    }

    mysqli_close($conexion);

?>