<?php
    include('../includes/utilerias.php');
    $id=validar($_POST['id']);
    $usuario=validar($_POST['usuario']);
    $pass=validar($_POST['pass']);
    $tipo_usuario=validar($_POST['tipo_usuario']);


    $conexion = conectar();

    $sql = "update login set id='$id',usuario='$usuario',pass='$pass',tipo_usuario='$tipo_usuario' where id='$id'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        redireccionar('Datos editados exitósamente','../inventario.php?inv=utilerias');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=utilerias');
    }

    mysqli_close($conexion);

?>