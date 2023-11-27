<?php
require_once 'includes/validar_sesion.php';
include('includes/encabezado.php');
include('includes/menu.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/equipo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </style>
    <title>Formulario de equipo</title>
</head>

<body>
    <div class="form-style">
        <form action="../php/tools/edita_datos_energia.php" method="post" class="form-container">
            <div class="cpu">
                <h2>Datos de NoBreak y UPS</h2>
                <h3>Datos del resguardante</h3>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

                $serie = $_GET['id'];

                $sql = "select * from ups where serie='$serie'";
                $query = mysqli_query($conexion, $sql);

                $row = mysqli_fetch_array($query);
                ?>
                <div class="datos">
                    <div class="box">
                        <label for="campo">Nombre del empleado:</label>
                        <input type="text" name="campo" id="campo" value="<?php echo $row['nombreEmpleado'] ?>" required>
                        <ul id="lista"></ul>
                    </div>
                    <div class="box">
                        <label class="form-label" for="claveArea">Area del empleado:</label>
                        <input class="form-input" type="claveArea" id="claveArea" name="claveArea" value="<?php echo $row['claveArea'] ?>" readonly>
                    </div>   
                    <div class="box">
                        <label class="junta" for="junta">Junta a la que pertenece:</label>
                        <input class="form-input" type="junta" id="junta" name="junta" value="<?php echo $row['junta'] ?>" readonly>
                    </div>
                </div>
                <h3>Datos de Hardware</h3>
                <div class="datos">
                    <div class="box">
                        <label for="tipo">Tipo de Dispositivo</label>
                        <select id="tipo" name="tipo">
                            <option <?php echo $row['tipo'] === 'UPS' ? "selected='selected'" : "" ?>value='UPS'>UPS</option>
                            <option <?php echo $row['tipo'] === 'NOBREAK' ? "selected='selected'" : "" ?>value='NOBREAK'>NOBREAK</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="marca">Marca</label>
                        <select id="marca" name="marca">
                            <option <?php echo $row['marca'] === 'TRIPPLITE' ? "selected='selected'" : "" ?> value='TRIPPLITE'>TRIPPLITE</option>
                            <option <?php echo $row['marca'] === 'SOLA BASIC' ? "selected='selected'" : "" ?> value='SOLA BASIC'>SOLA BASIC</option>
                            <option <?php echo $row['marca'] === 'EATON' ? "selected='selected'" : "" ?> value='EATON'>EATON</option>
                            <option <?php echo $row['marca'] === 'BEST POWER' ? "selected='selected'" : "" ?> value='BEST POWER'>BEST POWER</option>
                            <option <?php echo $row['marca'] === 'ATLANTA' ? "selected='selected'" : "" ?> value='ATLANTA'>ATLANTA</option>
                            <option <?php echo $row['marca'] === 'DATA SHIELD' ? "selected='selected'" : "" ?> value='DATA SHIELD'>DATA SHIELD</option>
                            <option <?php echo $row['marca'] === 'VICA' ? "selected='selected'" : "" ?> value='VICA'>VICA</option>
                            <option <?php echo $row['marca'] === 'POWER WARE' ? "selected='selected'" : "" ?> value='POWER WARE'>POWER WARE</option>
                            <option <?php echo $row['marca'] === 'MGE' ? "selected='selected'" : "" ?> value='MGE'>MGE</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input class="form-input" type="text" id="modelo" name="modelo" value="<?php echo $row['modelo'] ?>" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serie">Numero de Serie</label>
                        <input class="form-input" type="text" id="serie" name="serie" value="<?php echo $row['serie'] ?>" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInv">Numero de Inventario</label required>
                        <input class="form-input" type="text" id="numInv" name="numInv" value="<?php echo $row['numInv'] ?>" required>
                    </div>
                    <div class="box">
                        <label for="propiedad">Tipo de propiedad:</label>
                        <select id="propiedad" name="propiedad">
                            <option <?php echo $row['propiedad'] === 'INE' ? "selected='selected'" : "" ?>value='INE'>INE</option>
                            <option <?php echo $row['propiedad'] === 'SAC' ? "selected='selected'" : "" ?>value='SAC'>SAC</option>
                        </select>
                    </div>
                </div>
                <h3>Datos de Software</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="mac">Dirección MAC</label>
                        <input class="form-input" type="text" id="mac" name="mac" value="<?php echo $row['mac'] ?>" pattern="^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ip">Dirección IP</label>
                        <input class="form-input" type="text" id="ip" name="ip" value="<?php echo $row['ip'] ?>" pattern="^(\d{1,3}\.){3}\d{1,3}$" required>
                    </div>
                </div>
        </form>
        <div class="submit-container">
            <button class="submit-button" type="submit">Registrar</button>
        </div>
        <script src="../js/peticiones.js"></script>
    </div>
</body>

</html>