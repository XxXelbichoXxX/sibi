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
        <form action="../php/tools/insertar_datos_energia.php" method="post" class="form-container" enctype="multipart/form-data" autocomplete="off">
            <div class="cpu">
                <h2>Datos de NoBreak y UPS</h2>
                <h3>Datos del resguardante</h3>
                <div class="datos">
                    <div class="box">
                        <label for="campo">Nombre del empleado:</label>
                        <input type="text" name="campo" id="campo" required>
                        <ul id="lista"></ul>
                    </div>
                    <div class="box">
                        <label class="form-label" for="claveArea">Area del empleado:</label>
                        <input class="form-input" type="text" id="claveArea" name="claveArea" readonly>
                    </div>   
                    <div class="box">
                        <label class="junta" for="junta">Junta a la que pertenece:</label>
                        <input class="form-input" type="text" id="junta" name="junta" readonly>
                    </div>
                </div>
                <h3>Datos de Hardware</h3>
                <div class="datos">
                    <div class="box">
                        <label for="tipo">Tipo de Dispositivo</label>
                        <select id="tipo" name="tipo">
                            <option value="UPS">UPS</option>
                            <option value="NOBREAK">NOBREAK</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="marca">Marca</label>
                        <select id="marca" name="marca">
                            <option value="TRIPPLITE">TRIPPLITE</option>
                            <option value="SOLA BASIC">SOLA BASIC</option>
                            <option value="EATON">EATON</option>
                            <option value="BEST POWER">BEST POWER</option>
                            <option value="ATLANTA">ATLANTA</option>
                            <option value="DATA SHIELD">DATA SHIELD</option>
                            <option value="VICA">VICA</option>
                            <option value="POWER WARE">POWER WARE</option>
                            <option value="MGE">MGE</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input class="form-input" type="text" id="modelo" name="modelo" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serie">Numero de Serie</label>
                        <input class="form-input" type="text" id="serie" name="serie" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInv">Numero de Inventario</label>
                        <input class="form-input" type="text" id="numInv" name="numInv" required>
                    </div>
                    <div class="box">
                        <label for="propiedad">Tipo de propiedad:</label>
                        <select id="propiedad" name="propiedad">
                            <option value="INE">INE</option>
                            <option value="SAC">SAC</option>
                        </select>
                    </div>
                </div>
                <h3>Datos de Software</h3>
                <div class="datos">
                    <div class="box">
                        <label class="form-label" for="mac">Dirección MAC</label>
                        <input class="form-input" type="text" id="mac" name="mac" pattern="^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="ip">Dirección IP</label>
                        <input class="form-input" type="text" id="ip" name="ip" pattern="^(\d{1,3}\.){3}\d{1,3}$" required>
                    </div>
                </div>
                <div class="submit-container">
                    <button class="submit-button" type="submit">Registrar</button>
                </div>
            </div>
        </form>
        <script src="../js/peticiones.js"></script>
    </div> <!--ENERGIA-->
</body>

</html>