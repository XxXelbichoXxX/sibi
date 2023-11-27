<?php
    include('../includes/utilerias.php');
    $usuario = validar($_POST['usuario']);
    $pass = validar($_POST['pass']);
    $tipo = validar($_POST['tipo_usuario']);
    
    $conexion = conectar();



    $sql = "insert into login (usuario, pass, tipo_usuario) values ('$usuario','$pass','$tipo')";


    $resultado = mysqli_multi_query($conexion, $sql);

    if($resultado ){
        redireccionar('Datos guardados exitósamente','../inventario.php?inv=utilerias');
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=utilerias');
    }

    mysqli_close($conexion);

?>