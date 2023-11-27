<?php
require_once 'includes/validar_sesion.php';
include('includes/encabezado.php');
include('includes/menu.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Index</title>
</head>

<body>
    <?php
    if ($_GET['inv'] == "cpu") {
        echo "<div class='titulo'>
                                <h1>Inventario de Computadoras</h1>
                            </div>";
    } elseif ($_GET['inv'] == "laptop") {
        echo "<div class='titulo'>
                                <h1>Inventario de Laptops</h1>
                            </div>";
    } elseif ($_GET['inv'] == "impresora") {
        echo "<div class='titulo'>
                                <h1>Inventario de Impresoras y Scanners</h1>
                            </div>";
    } elseif ($_GET['inv'] == "telefonia") {
        echo "<div class='titulo'>
                                <h1>Inventario de Telefonia</h1>
                            </div>";
    } elseif ($_GET['inv'] == "energia") {
        echo "<div class='titulo'>
                                <h1>Inventario de NoBreaks y UPS</h1>
                            </div>";
    } elseif ($_GET['inv'] == "personal") {
        echo "<div class='titulo'>
                                <h1>Directorio de personal</h1>
                            </div>";
    } elseif ($_GET['inv'] == "utilerias") {
        echo "<div class='titulo'>
                                <h1>Directorio de usuarios</h1>
                            </div>";
    }
    ?>

    <br>
    <table class="datatable" id="datatable">
        <thead>
            <tr>
                <?php
                if ($_GET['inv'] == "utilerias"){
                    echo '<th>Nombre de usuario</th>';
                    echo '<th>Contraseña</th>';
                    echo '<th>Tipo de usuario</th>';
                    echo '<th></th>';
                    echo '<th></th>';
                }
                elseif ($_GET['inv'] == "cpu") {
                    echo '<th>Serie</th>';
                    echo '<th>Resguardante</th>';
                    echo '<th>Area</th>';
                    echo '<th>Junta a la que pertenece</th>';
                    echo '<th>Marca</th>';
                    echo '<th>Modelo</th>';
                    echo '<th>Numero de inventario</th>';
                    echo '<th>Sistema operativo</th>';
                    echo '<th>Procesador</th>';
                    echo '<th>Memoria RAM</th>';
                    echo '<th>Dirección MAC</th>';
                    echo '<th>Dirección IP</th>';
                    echo '<th>Conexión</th>';
                    echo '<th>Perfil</th>';
                    echo '<th>Propiedad</th>';
                } elseif ($_GET['inv'] == "laptop") {
                    echo '<script>';
                    echo 'var path = ' . json_encode($_GET['inv']) . ';';
                    echo '</script>';
                    echo '
                            <th>Serie</th>
                            <th>Resguardante</th>
                            <th>Area</th>
                            <th>Junta a la que pertenece</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Numero de inventario</th>
                            <th>Sistema operativo</th>
                            <th>Procesador</th>
                            <th>Memoria RAM</th>
                            <th>Dirección MAC</th>
                            <th>Dirección IP</th>
                            <th>Propiedad</th>
                            <th>Perfil</th>
                            <th>Serie Docking</th>
                            <th>MAC Docking</th>
                            <th></th>
                            <th></th>';
                } elseif ($_GET['inv'] == "impresora") {
                    echo '<script>';
                    echo 'var path = ' . json_encode($_GET['inv']) . ';';
                    echo '</script>';
                    echo '
                            <th>Serie</th>
                            <th>Resguardante</th>
                            <th>Area</th>
                            <th>Junta a la que pertenece</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dirección MAC</th>
                            <th>Dirección IP</th>
                            <th>Numero de inventario</th>
                            <th></th>
                            <th></th>';
                } elseif ($_GET['inv'] == "telefonia") {
                    echo '<script>';
                    echo 'var path = ' . json_encode($_GET['inv']) . ';';
                    echo '</script>';
                    echo '<
                            <th>Serie</th>
                            <th>Resguardante</th>
                            <th>Area</th>
                            <th>Junta a la que pertenece</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Numero de inventario</th>
                            <th>Extensión</th>
                            <th>Dirección MAC</th>
                            <th>Dirección IP</th>
                            <th>Propiedad</th>
                            <th></th>
                            <th></th>';
                } elseif ($_GET['inv'] == "energia") {
                    echo '<script>';
                    echo 'var path = ' . json_encode($_GET['inv']) . ';';
                    echo '</script>';
                    echo '
                            <th>Serie</th>
                            <th>Resguardante</th>
                            <th>Area</th>
                            <th>Junta a la que pertenece</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dirección MAC</th>
                            <th>Dirección IP</th>
                            <th>Numero de inventario</th>
                            <th>Propiedad</th>
                            <th></th>
                            <th></th>';
                } elseif ($_GET['inv'] == "personal") {
                    echo '<th>Area del empleado</th>';
                    echo '<th>Junta a la que pertenece</th>';
                    echo '<th>Nombre del Empleado</th>';
                    echo '<th>Cargo</th>';
                    echo '<th>Correo Electronico</th>';
                    echo '<th></th>';
                    echo '<th></th>';
                }
                ?>
            </tr>
        </thead>
        <?php
            if ($_GET['inv'] == "cpu") {
            echo '<script>';
            echo 'var path = ' . json_encode($_GET['inv']) . ';';
            echo '</script>';
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from equipo";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $serie = $renglon['serie'];
                    $nombreEmpleado = $renglon['nombreEmpleado'];
                    $area = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $marca = $renglon['marca'];
                    $modelo = $renglon['modelo'];
                    $numInv = $renglon['numInv'];
                    $sistema = $renglon['sistema'];
                    $procesador = $renglon['procesador'];
                    $ram = $renglon['ram'];
                    $mac = $renglon['mac'];
                    $ip = $renglon['ip'];
                    $conexion = $renglon['conexion'];
                    $perfil = $renglon['perfil'];
                    $propiedad = $renglon['propiedad'];
                    $resguardo = $renglon['resguardo'];
                    $baja = $renglon['baja'];
                    echo "
                                    <tr>
                                    <td>$serie</td>
                                    <td>$nombreEmpleado</td>
                                    <td>$area</td>
                                    <td>$junta</td>
                                    <td>$marca</td>
                                    <td>$modelo</td>
                                    <td>$numInv</td>
                                    <td>$sistema</td>
                                    <td>$procesador</td>
                                    <td>$ram</td>
                                    <td>$mac</td>
                                    <td>$ip</td>
                                    <td>$conexion</td>
                                    <td>$perfil</td>
                                    <td>$propiedad</td>
                                    <td><a href='../php/ver_cpu.php?id=$serie'>Ver datos del equipo</a></td>
                                    <td><a href='../php/edita_cpu.php?id=$serie'>Editar datos del equipo</a></td>
                                    <td><a href='../php/tools/eliminar_cpu.php?id=$serie'>Eliminar</a></td>";
                                    if (!empty($resguardo) || !empty($baja)) {
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=EQUIPO'>Ver documentos</a></td>";
                                      }else{
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=EQUIPO'>Agregar Documentos</a></td>";
                                      }
                                   
                                    echo "</tr>";
                }
            }
        } elseif ($_GET['inv'] == "laptop") {
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from laptop";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $serie = $renglon['serie'];
                    $claveEmpleado = $renglon['nombreEmpleado'];
                    $area = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $marca = $renglon['marca'];
                    $modelo = $renglon['modelo'];
                    $numInv = $renglon['numInv'];
                    $sistema = $renglon['sistema'];
                    $procesador = $renglon['procesador'];
                    $ram = $renglon['ram'];
                    $mac = $renglon['mac'];
                    $ip = $renglon['ip'];
                    $perfil = $renglon['perfil'];
                    $sD = $renglon['serieD'];
                    $mD = $renglon['MACD'];
                    $propiedad = $renglon['propiedad'];
                    $resguardo = $renglon['resguardo'];
                    $baja = $renglon['baja'];
                    echo "
                                    <tr>
                                    <td>$serie</td>
                                    <td>$claveEmpleado</td>
                                    <td>$area</td>
                                    <td>$junta</td>
                                    <td>$marca</td>
                                    <td>$modelo</td>
                                    <td>$numInv</td>
                                    <td>$sistema</td>
                                    <td>$procesador</td>
                                    <td>$ram</td>
                                    <td>$mac</td>
                                    <td>$ip</td>
                                    <td>$propiedad</td>
                                    <td>$perfil</td>
                                    <td>$sD</td>
                                    <td>$mD</td>
                                    <td><a href='../php/edita_laptop.php?id=$serie'>Editar datos de la laptop</a></td>
                                    <td><a href='../php/tools/eliminar_laptop.php?id=$serie'>Eliminar</a></td>"; 
                                    if (!empty($resguardo) || !empty($baja)) {
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=LAPTOP'>Ver documentos</a></td>";
                                      }else{
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=LAPTOP'>Agregar Documentos</a></td>";
                                      }
                                   
                                    echo "</tr>";
                }
            }
        } elseif ($_GET['inv'] == "impresora") {
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from impsca";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $serie = $renglon['serie'];
                    $claveEmpleado = $renglon['nombreEmpleado'];
                    $area = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $tipo = $renglon['tipo'];
                    $marca = $renglon['marca'];
                    $modelo = $renglon['modelo'];
                    $mac = $renglon['mac'];
                    $ip = $renglon['ip'];
                    $numInv = $renglon['numInv'];
                    $resguardo = $renglon['resguardo'];
                    $baja = $renglon['baja'];
                    echo "
                                    <tr>
                                    <td>$serie</td>
                                    <td>$claveEmpleado</td>
                                    <td>$area</td>
                                    <td>$junta</td>
                                    <td>$tipo</td>
                                    <td>$marca</td>
                                    <td>$modelo</td>
                                    <td>$mac</td>
                                    <td>$ip</td>
                                    <td>$numInv</td>
                                    <td><a href='../php/edita_impresora.php?id=$serie'>Editar datos del equipo</a></td>
                                    <td><a href='../php/tools/eliminar_impresora.php?id=$serie'>Eliminar</a></td>";  
                                    if (!empty($resguardo) || !empty($baja)) {
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=IMPSCA'>Ver documentos</a></td>";
                                      }else{
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=IMPSCA'>Agregar Documentos</a></td>";
                                      }
                                   
                                    echo "</tr>";
                }
            }
        } elseif ($_GET['inv'] == "telefonia") {
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from telefonia";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $serie = $renglon['serie'];
                    $claveEmpleado = $renglon['nombreEmpleado'];
                    $area = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $marca = $renglon['marca'];
                    $modelo = $renglon['modelo'];
                    $numInv = $renglon['numInv'];
                    $extension = $renglon['extension'];
                    $mac = $renglon['mac'];
                    $ip = $renglon['ip'];
                    $propiedad = $renglon['propiedad'];
                    echo "
                                    <tr>
                                    <td>$serie</td>
                                    <td>$claveEmpleado</td>
                                    <td>$area</td>
                                    <td>$junta</td>
                                    <td>$marca</td>
                                    <td>$modelo</td>
                                    <td>$numInv</td>
                                    <td>$extension</td>
                                    <td>$mac</td>
                                    <td>$ip</td>
                                    <td>$propiedad</td>
                                    <td><a href='../php/edita_telefonia.php?id=$serie'>Editar datos del télefono</a></td>
                                    <td><a href='../php/tools/eliminar_telefonia.php?id=$serie'>Eliminar</a></td>";
                                    if (!empty($baja)) {
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=TELEFONIA'>Ver documentos</a></td>";
                                      }else{
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=TELEFONIA'>Agregar Documentos</a></td>";
                                      }
                                   
                                    echo "</tr>";
                }
            }
        } elseif ($_GET['inv'] == "energia") {
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from ups";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $serie = $renglon['serie'];
                    $claveEmpleado = $renglon['nombreEmpleado'];
                    $area = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $tipo = $renglon['junta'];
                    $marca = $renglon['marca'];
                    $modelo = $renglon['modelo'];
                    $mac = $renglon['mac'];
                    $ip = $renglon['ip'];
                    $numInv = $renglon['numInv'];
                    $propiedad = $renglon['propiedad'];
                    $resguardo = $renglon['resguardo'];
                    $baja = $renglon['baja'];
                    echo "
                                    <tr>
                                    <td>$serie</td>
                                    <td>$claveEmpleado</td>
                                    <td>$area</td>
                                    <td>$junta</td>
                                    <td>$tipo</td>
                                    <td>$marca</td>
                                    <td>$modelo</td>
                                    <td>$mac</td>
                                    <td>$ip</td>
                                    <td>$numInv</td>
                                    <td>$propiedad</td>
                                    <td><a href='../php/edita_energia.php?id=$serie'>Editar datos del equipo</a></td>
                                    <td><a href='../php/tools/eliminar_energia.php?id=$serie'>Eliminar</a></td>";
                                    if (!empty($resguardo) || !empty($baja)) {
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=UPS'>Ver documentos</a></td>";
                                      }else{
                                        echo "<td><a href='../php/hubDocs.php?id=$serie&inv=UPS'>Agregar Documentos</a></td>";
                                      }
                                   
                                    echo "</tr>";
                }
            }
        } elseif ($_GET['inv'] == "personal") {
            echo '<script>';
            echo 'var path = ' . json_encode($_GET['inv']) . ';';
            echo '</script>';
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from empleado";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $claveEmpleado = $renglon['claveEmpleado'];
                    $claveArea = $renglon['claveArea'];
                    $junta = $renglon['junta'];
                    $nombreEmpleado = $renglon['nombreEmpleado'];
                    $cargo = $renglon['cargo'];
                    $correo = $renglon['correo'];
                    echo "
                                    <tr>
                                    <td>$claveArea</td>
                                    <td>$junta</td>
                                    <td>$nombreEmpleado</td>
                                    <td>$cargo</td>
                                    <td>$correo</td>
                                    <td><a href='../php/edita_personal.php?id=$claveEmpleado'>Editar datos de empleado</a></td>
                                    <td><a href='../php/tools/eliminar_personal.php?id=$claveEmpleado'>Eliminar</a></td>                     
                                    </tr>";
                }
            }
        } elseif ($_GET['inv'] == "utilerias") {
            echo '<script>';
            echo 'var path = ' . json_encode($_GET['inv']) . ';';
            echo '</script>';
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "select * from login";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($renglon = mysqli_fetch_assoc($result)) {
                    $usuario = $renglon['usuario'];
                    $pass = $renglon['pass'];
                    $tipoUsuario = $renglon['tipo_usuario'];
                    echo "
                                    <tr>
                                    <td>$usuario</td>
                                    <td>$pass</td>
                                    <td>$tipoUsuario</td>
                                    <td><a href='../php/edita_usuario.php?usuario=$usuario'>Editar datos de usuario</a></td>
                                    <td><a href='../php/tools/eliminar_usuario.php?usuario=$usuario'>Eliminar</a></td>                     
                                    </tr>";
                }
            }
        }
        ?>
        </tr>
        </tbody>
    </table>
        <script src="../js/main.js"></script>
        <script>
            const dt = new DataTable('#datatable', [{
                id: 'bAdd',
                text: 'agregar',
                icon: 'add_circle',
                action: function() {
                    var pathr = 'inserta_' + path + '.php';
                    window.location.href = pathr;
                }
            },{
                id: 'bRep',
                text: 'Reporte',
                icon: 'notebook',
                action: function() {
                    var pathr = 'reporte_' + path + '.php';
                    window.location.href = pathr;
                }
            }]);
            dt.parse();
        </script>
</body>

</html>