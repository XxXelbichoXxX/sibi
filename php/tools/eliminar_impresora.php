<?php
    include('../includes/utilerias.php');
    $conexion = conectar();

    $serie=$_GET['id'];

    $sql =  "delete from impsca where serie='$serie'";
    $sql3 = "delete from documento where serie='$serie'";

    $resultado3 = mysqli_query($conexion,$sql3);

    $resultado = mysqli_query($conexion,$sql);


    if($resultado){
        redireccionar('Datos eliminados exitósamente','../inventario.php?inv=impresora');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=impresora');
    }

    mysqli_close($conexion);

?>