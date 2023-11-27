<?php
    require_once 'includes/validar_sesion.php';
    header("Content-Type: application/vdm.ms-excel; charset=utf-8");
    header("content-Disposition: attachment; filename=datos-energia.xls");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table>
    <caption>Datos de energia</caption>
    <tr>
        <th>Numero de serie</th>
        <th>Resguardante</th>
        <th>Area</th>
        <th>Junta</th>
        <th>Tipo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Numero de inventario</th>
        <th>Dirección Mac</th>
        <th>Dirección IP</th>
        <th>Propiedad</th>
    </tr>

    <?php 
    
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
    $consulta = mysqli_query($conexion, "SELECT * FROM ups");   
    while($row = mysqli_fetch_assoc($consulta)) { ?>
    <tr>
        <td><?php echo $row["serie"]?></td>
        <td><?php echo $row["nombreEmpleado"]?></td>
        <td><?php echo $row["claveArea"]?></td>
        <td><?php echo $row["junta"]?></td>
        <td><?php echo $row["tipo"]?></td>
        <td><?php echo $row["marca"]?></td>
        <td><?php echo $row["modelo"]?></td>
        <td>&#8238;<?php echo $row["numInv"]?></td>
        <td><?php echo $row["mac"]?></td>
        <td><?php echo $row["ip"]?></td>
        <td><?php echo $row["propiedad"]?></td>
    </tr>
    <?php } mysqli_free_result($consulta);?>

</table>