<?php
    include('../includes/utilerias.php');
    $conexion = conectar();

    $usuario=$_GET['usuario'];
    session_start();

    if($_SESSION['user']==$usuario){
        redireccionar('No puedes eliminarte a ti mismo','../inventario.php?inv=utilerias');
        exit;
    }

    $sql = "delete from login where usuario='$usuario'";
    $resultado = mysqli_query($conexion,$sql);
    
    if($resultado){
        redireccionar('Datos eliminados exitósamente','../inventario.php?inv=utilerias');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=utilerias');
    }

    mysqli_close($conexion);

?>