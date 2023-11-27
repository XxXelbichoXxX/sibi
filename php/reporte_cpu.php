<?php
    require_once 'includes/validar_sesion.php';
    header("Content-Type: application/vdm.ms-excel; charset=utf-8");
    header("content-Disposition: attachment; filename=datos-equipo.xls");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table>
    <caption>Datos del equipo</caption>
    <tr>
        <th>Numero de serie</th>
        <th>Resguardante</th>
        <th>Area</th>
        <th>Junta</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Numero de inventario</th>
        <th>Sistema Operativo</th>
        <th>Perfil</th>
        <th>Procesador</th>
        <th>Memoria Ram</th>
        <th>Dirección Mac</th>
        <th>Dirección IP</th>
        <th>Tipo de conexión</th>
        <th>Propiedad</th>
    </tr>

    <?php 
    
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
    $consulta = mysqli_query($conexion, "SELECT * FROM equipo");   
    while($row = mysqli_fetch_assoc($consulta)) { ?>
    <tr>
        <td><?php echo $row["serie"]?></td>
        <td><?php echo $row["nombreEmpleado"]?></td>
        <td><?php echo $row["claveArea"]?></td>
        <td><?php echo $row["junta"]?></td>
        <td><?php echo $row["marca"]?></td>
        <td><?php echo $row["modelo"]?></td>
        <td>&#8238;<?php echo $row["numInv"]?></td>
        <td><?php echo $row["sistema"]?></td>
        <td><?php echo $row["perfil"]?></td>
        <td><?php echo $row["procesador"]?></td>
        <td><?php echo $row["ram"]?></td>
        <td><?php echo $row["mac"]?></td>
        <td><?php echo $row["ip"]?></td>
        <td><?php echo $row["conexion"]?></td>
        <td><?php echo $row["propiedad"]?></td>
    </tr>
    <?php } mysqli_free_result($consulta);?>

</table>