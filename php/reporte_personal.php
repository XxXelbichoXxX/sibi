<?php
    require_once 'includes/validar_sesion.php';
    header("Content-Type: application/vdm.ms-excel; charset=utf-8");
    header("content-Disposition: attachment; filename=datos-personal.xls");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table>
    <caption>Datos del personal</caption>
    <tr>
        <th>Nombre</th>
        <th>Area</th>
        <th>Cargo</th>
        <th>Correo</th>
    </tr>

    <?php 
    
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
    $consulta = mysqli_query($conexion, "SELECT * FROM empleado");   
    while($row = mysqli_fetch_assoc($consulta)) { ?>
    <tr>
        <td><?php echo $row["nombreEmpleado"]?></td>
        <td><?php echo $row["claveArea"]?></td>
        <td><?php echo $row["cargo"]?></td>
        <td><?php echo $row["correo"]?></td>
    </tr>
    <?php } mysqli_free_result($consulta);?>

</table>