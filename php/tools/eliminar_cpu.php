<?php
    include('../includes/utilerias.php');
    $conexion = conectar();

    $serie=$_GET['id'];

    $sql =  "delete from bit_equipo where serieE='$serie'";
    $sql2 = "delete from equipo where serie='$serie'";
    $sql3 = "delete from documento where serie='$serie'";

    $resultado3 = mysqli_query($conexion,$sql3);

    $resultado = mysqli_query($conexion,$sql);

    $resultado2 = mysqli_query($conexion,$sql2);

    if($resultado and $resultado2){
        redireccionar('Datos eliminados exitósamente','../inventario.php?inv=cpu');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=cpu');
    }

    mysqli_close($conexion);

?>