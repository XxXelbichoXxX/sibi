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
    </style>
    <title>Formulario de equipo</title>
</head>

<body>
    <div class="form-style">
        <?php
        $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

        $serie = $_GET['id'];

        $sql = "select * from equipo where serie='$serie'";
        $query = mysqli_query($conexion, $sql);

        $row = mysqli_fetch_array($query);
        ?>
        <form action="../php/inventario.php?inv=cpu" method="post" class="form-container">
            <div class="cpu">
                <h2>Datos del CPU</h2>
                <h3>Datos del resguardante</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="claveEmpleado">Nombre del propietario</label>
                        <input class="form-input" type="text" id="claveEmpleado" name="claveEmpleado" value="<?php echo $row['nombreEmpleado'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="claveArea">Ubicación</label>
                        <input class="form-input" type="text" id="claveArea" name="claveArea" value="<?php echo $row['claveArea'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="junta">Junta</label>
                        <input class="form-input" type="text" id="junta" name="junta" value="<?php echo $row['junta'] ?>" readonly>
                    </div>
                </div>
                <h3>Datos de Hardware</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="marcaE">Marca</label>
                        <input class="form-input" type="text" id="marcaE" name="marcaE" value="<?php echo $row['marca'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modeloE">Modelo</label>
                        <input class="form-input" type="text" id="modeloE" name="modeloE" value="<?php echo $row['modelo'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieE">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieE" name="serieE" value="<?php echo $row['serie'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvE">Numero de Inventario</label required>
                        <input class="form-input" type="text" id="numInvE" name="numInvE" value="<?php echo $row['numInv'] ?>" readonly>
                    </div>
                </div>
                <h3>Datos de Software</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="sistema">Sistema Operativo</label>
                        <input class="form-input" type="text" id="sistema" name="sistema" value="<?php echo $row['sistema'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="procesador">Procesador</label>
                        <input class="form-input" type="text" id="procesador" name="procesador" value="<?php echo $row['procesador'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ram">Memoria Ram</label>
                        <input class="form-input" type="text" id="ram" name="ram" value="<?php echo $row['ram'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="mac">Dirección MAC</label>
                        <input class="form-input" type="text" id="mac" name="mac" value="<?php echo $row['mac'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ip">Dirección IP</label>
                        <input class="form-input" type="text" id="ip" name="ip" value="<?php echo $row['ip'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="conexion">Tipo de conexión</label>
                        <input class="form-input" type="text" id="conexion" name="conexion" value="<?php echo $row['conexion'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="propiedad">Tipo de Propiedad</label>
                        <input class="form-input" type="text" id="propiedad" name="propiedad" value="<?php echo $row['propiedad'] ?>" readonly>
                    </div>
                </div>
            </div> <!--CPU-->


            <div class="equipo">
                <h2>Datos del equipo</h2>
                <h3>Datos de Monitor</h3>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

                $serie = $_GET['id'];

                $sql = "select * from bit_equipo where serieE='$serie' and tipo = 'Monitor'";
                $query = mysqli_query($conexion, $sql);

                $row = mysqli_fetch_array($query);
                ?>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="marcaM">Marca</label>
                        <input class="form-input" type="text" id="marcaM" name="marcaM" value="<?php echo $row['marca'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modeloM">Modelo</label>
                        <input class="form-input" type="text" id="modeloM" name="modeloM" value="<?php echo $row['modelo'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieM">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieM" name="serieM" value="<?php echo $row['serie'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvM">Numero de Inventario</label>
                        <input class="form-input" type="text" id="numInvM" name="numInvM" value="<?php echo $row['numInv'] ?>" readonly>
                    </div>
                </div>

                <h3>Datos de Teclado</h3>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

                $serie = $_GET['id'];

                $sql = "select * from bit_equipo where serieE='$serie' and tipo = 'Teclado'";
                $query = mysqli_query($conexion, $sql);

                $row = mysqli_fetch_array($query);
                ?>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="marcaT">Marca</label>
                        <input class="form-input" type="text" id="marcaT" name="marcaT" value="<?php echo $row['marca'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modeloT">Modelo</label>
                        <input class="form-input" type="text" id="modeloT" name="modeloT" value="<?php echo $row['modelo'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieT">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieT" name="serieT" value="<?php echo $row['serie'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvT">Numero de Inventario</label>
                        <input class="form-input" type="text" id="numInvT" name="numInvT" value="<?php echo $row['numInv'] ?>" readonly>
                    </div>
                </div>

                <h3>Datos de Mouse</h3>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

                $serie = $_GET['id'];

                $sql = "select * from bit_equipo where serieE='$serie' and tipo = 'Mouse'";
                $query = mysqli_query($conexion, $sql);

                $row = mysqli_fetch_array($query);
                ?>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="marcaMo">Marca</label>
                        <input class="form-input" type="text" id="marcaMo" name="marcaMo" value="<?php echo $row['marca'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modeloMo">Modelo</label>
                        <input class="form-input" type="text" id="modeloMo" name="modeloMo" value="<?php echo $row['modelo'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieMo">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieMo" name="serieMo" value="<?php echo $row['serie'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvMo">Numero de Inventario</label>
                        <input class="form-input" type="text" id="numInvMo" name="numInvMo" value="<?php echo $row['numInv'] ?>" readonly>
                    </div>
                </div>
                <div class="submit-container">
                    <button class="submit-button" type="submit">Regresar</button>
                </div>
            </div><!--Equipo-->
        </form>
    </div>


</body>

</html>