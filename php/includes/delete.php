<?php
include('utilerias.php');
$conexion = mysqli_connect('localhost', 'root', '', 'sibi');


// Obtener el nombre del archivo desde la URL
$id = $_GET['id'];
$serie = $_GET['serie'];
$inv = $_GET['inv'];

// Buscar el archivo en la base de datos
$sql =  "delete from documento where idDoc = '$id'";
$resultado = mysqli_query($conexion, $sql);
    if($resultado){
        redireccionar('Archivo eliminado exitósamente', '../hubDocs.php?id='.$serie.'&inv='.$inv);
    }else{
        redireccionar('Error: '.mysqli_error($conexion),'../inventario.php?inv=cpu');
    }
    mysqli_close($conexion);

?>