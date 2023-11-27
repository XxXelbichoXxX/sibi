<?php
    require_once 'includes/validar_sesion.php';
    header("Content-Type: application/vdm.ms-excel; charset=utf-8");
    header("content-Disposition: attachment; filename=datos-usuarios.xls");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table>
    <caption>Datos de usuarios</caption>
    <tr>
        <th>Nombre de usuario</th>
        <th>Contraseña</th>
        <th>Tipo de usuario</th>
    </tr>

    <?php 
    
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
    $consulta = mysqli_query($conexion, "SELECT * FROM login");   
    while($row = mysqli_fetch_assoc($consulta)) { ?>
    <tr>
        <td><?php echo $row["usuario"]?></td>
        <td><?php echo $row["pass"]?></td>
        <td><?php echo $row["tipo_usuario"]?></td>
    </tr>
    <?php } mysqli_free_result($consulta);?>

</table>