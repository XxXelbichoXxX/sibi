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
        <form action="../php/tools/edita_datos_cpu.php" method="post" class="form-container" enctype="multipart/form-data" autocomplete="off">
            <div class="cpu">
                <h2>Datos del CPU</h2>
                <h3>Datos del resguardante</h3>
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
                        <label for="marcaE">Marca</label>
                        <select id="marcaE" name="marcaE">
                            <option <?php echo $row['marca'] === 'DELL' ? "selected='selected'" : "" ?>value='DELL'>DELL</option>
                            <option <?php echo $row['marca'] === 'LENOVO' ? "selected='selected'" : "" ?>value='LENOVO'>LENOVO</option>
                            <option <?php echo $row['marca'] === 'HP' ? "selected='selected'" : "" ?>value='HP'>HP</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modeloE">Modelo</label>
                        <input class="form-input" type="text" id="modeloE" name="modeloE" value="<?php echo $row['modelo'] ?>" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieE">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieE" name="serieE" value="<?php echo $row['serie'] ?>" readonly>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvE">Numero de Inventario</label required>
                        <input class="form-input" type="text" id="numInvE" name="numInvE" value="<?php echo $row['numInv'] ?>" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="conexion">Tipo de conexión</label>
                        <input class="form-input" type="text" id="conexion" name="conexion" value="<?php echo $row['conexion'] ?>" required>
                    </div>
                    <div class="box">
                        <label for="propiedad">Tipo de propiedad:</label>
                        <select id="propiedad" name="propiedad">
                            <option <?php echo $row['propiedad'] === 'INE' ? "selected='selected'" : "" ?>value='INE'>INE</option>
                            <option <?php echo $row['propiedad'] === 'SAC' ? "selected='selected'" : "" ?>value='SAC'>SAC</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="procesador">Procesador</label>
                        <input class="form-input" type="text" id="procesador" name="procesador" value="<?php echo $row['procesador'] ?>" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ram">Memoria Ram</label>
                        <select id="ram" name="ram">
                            <option <?php echo $row['ram'] === '4 GB' ? "selected='selected'" : "" ?>value='4 GB'>4 GB</option>
                            <option <?php echo $row['ram'] === '8 GB' ? "selected='selected'" : "" ?>value='8 GB'>8 GB</option>
                            <option <?php echo $row['ram'] === '16 GB' ? "selected='selected'" : "" ?>value='16 GB'>16 GB</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="dd">Disco Duro</label>
                        <select id="dd" name="dd">
                            <option <?php echo $row['dd'] === 'SSD 256GB' ? "selected='selected'" : "" ?>value='SSD 256GB'>SSD 256GB</option>
                            <option <?php echo $row['dd'] === 'SSD 512GB' ? "selected='selected'" : "" ?>value='SSD 512GB'>SSD 512GB</option>
                            <option <?php echo $row['dd'] === 'HDD 500GB' ? "selected='selected'" : "" ?>value='HDD 500GB'>HDD 500GB</option>
                            <option <?php echo $row['dd'] === 'HDD 1TB' ? "selected='selected'" : "" ?>value='HDD 1TB'>HDD 1TB</option>
                        </select>
                    </div>
                </div>
                <h3>Datos de Software</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="sistema">Sistema Operativo</label>
                        <select id="sistema" name="sistema">
                            <option <?php echo $row['sistema'] === 'Windows 10' ? "selected='selected'" : "" ?>value='Windows 10'>Windows 10</option>
                            <option <?php echo $row['sistema'] === 'Windows 11' ? "selected='selected'" : "" ?>value='Windows 11'>Windows 11</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="mac">Dirección MAC</label>
                        <input class="form-input" type="text" id="mac" name="mac" value="<?php echo $row['mac'] ?>" pattern="^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ip">Dirección IP</label>
                        <input class="form-input" type="text" id="ip" name="ip" value="<?php echo $row['ip'] ?>" pattern="^(\d{1,3}\.){3}\d{1,3}$" required>
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
                            <select id="marcaM" name="marcaM">
                                <option <?php echo $row['marca'] === 'DELL' ? "selected='selected'" : "" ?>value='DELL'>DELL</option>
                                <option <?php echo $row['marca'] === 'LENOVO' ? "selected='selected'" : "" ?>value='LENOVO'>LENOVO</option>
                                <option <?php echo $row['marca'] === 'HP' ? "selected='selected'" : "" ?>value='HP'>HP</option>
                            </select>
                        </div>
                        <div class="box">
                            <label class="form-label" for="modeloM">Modelo</label>
                            <input class="form-input" type="text" id="modeloM" name="modeloM" value="<?php echo $row['modelo'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="serieM">Numero de Serie</label>
                            <input class="form-input" type="text" id="serieM" name="serieM" value="<?php echo $row['serie'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="numInvM">Numero de Inventario</label>
                            <input class="form-input" type="text" id="numInvM" name="numInvM" value="<?php echo $row['numInv'] ?>" required>
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
                            <select id="marcaT" name="marcaT">
                                <option <?php echo $row['marca'] === 'DELL' ? "selected='selected'" : "" ?>value='DELL'>DELL</option>
                                <option <?php echo $row['marca'] === 'LENOVO' ? "selected='selected'" : "" ?>value='LENOVO'>LENOVO</option>
                                <option <?php echo $row['marca'] === 'HP' ? "selected='selected'" : "" ?>value='HP'>HP</option>
                            </select>
                        </div>
                        <div class="box">
                            <label class="form-label" for="modeloT">Modelo</label>
                            <input class="form-input" type="text" id="modeloT" name="modeloT" value="<?php echo $row['modelo'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="serieT">Numero de Serie</label>
                            <input class="form-input" type="text" id="serieT" name="serieT" value="<?php echo $row['serie'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="numInvT">Numero de Inventario</label>
                            <input class="form-input" type="text" id="numInvT" name="numInvT" value="<?php echo $row['numInv'] ?>" required>
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
                            <select id="marcaMo" name="marcaMo">
                                <option <?php echo $row['marca'] === 'LENOVO' ? "selected='selected'" : "" ?>value='LENOVO'>LENOVO</option>
                                <option <?php echo $row['marca'] === 'GENIUS' ? "selected='selected'" : "" ?>value='GENIUS'>GENIUS</option>
                                <option <?php echo $row['marca'] === 'DELL' ? "selected='selected'" : "" ?>value='DELL'>DELL</option>
                            </select>
                        </div>
                        <div class="box">
                            <label class="form-label" for="modeloMo">Modelo</label>
                            <input class="form-input" type="text" id="modeloMo" name="modeloMo" value="<?php echo $row['modelo'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="serieMo">Numero de Serie</label>
                            <input class="form-input" type="text" id="serieMo" name="serieMo" value="<?php echo $row['serie'] ?>" required>
                        </div>
                        <div class="box">
                            <label class="form-label" for="numInvMo">Numero de Inventario</label>
                            <input class="form-input" type="text" id="numInvMo" name="numInvMo" value="<?php echo $row['numInv'] ?>" required>
                        </div>
                    </div>
                </div><!--Equipo-->
        </form>
        <div class="submit-container">
            <button class="submit-button" type="submit">Registrar</button>
        </div>
        <script src="../js/peticiones.js"></script>
    </div>


</body>

</html>