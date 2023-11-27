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
        <form action="../php/tools/insertar_datos_laptop.php" method="post" class="form-container" enctype="multipart/form-data" autocomplete="off">
            <div class="cpu">
                <h2>Datos de Laptop</h2>
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
                        <label class="form-label" for="modeloE">Modelo</label>
                        <input class="form-input" type="text" id="modeloE" name="modeloE" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieE">Numero de Serie</label>
                        <input class="form-input" type="text" id="serieE" name="serieE" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="serieD">Serie del Docking</label>
                        <input class="form-input" type="text" id="serieD" name="serieD" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="macD">MAC del Docking</label>
                        <input class="form-input" type="text" id="macD" name="macD" pattern="^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$" required>
                    </div>
                    <div class="box">
                        <label class="form-label" for="numInvE">Numero de Inventario</label>
                        <input class="form-input" type="text" id="numInvE" name="numInvE" required>
                    </div>
                    <div class="box">
                        <label for="propiedad">Tipo de propiedad:</label>
                        <select id="propiedad" name="propiedad">
                            <option value="INE">INE</option>
                            <option value="SAC">SAC</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="perfil">Tipo de perfil:</label>
                        <select id="perfil" name="perfil">
                            <option value="TIPOB">TIPO B</option>
                            <option value="TIPOB+">TIPO B+</option>
                        </select>
                    </div>
                    <div class="box">
                        <label class="form-label" for="procesador">Procesador</label>
                        <input class="form-input" type="text" id="procesador" name="procesador" required>
                    </div>
                    <div class="box">
                        <label for="ram">Memoria Ram</label>
                        <select id="ram" name="ram">
                            <option value="4 GB">4 GB</option>
                            <option value="8 GB">8 GB</option>
                            <option value="16 GB">16 GB</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="dd">Disco Duro</label>
                        <select id="dd" name="dd">
                            <option value="SSD 256GB">SSD 256GB</option>
                            <option value="SSD 512GB">SSD 512GB</option>
                            <option value="HDD 500GB">HDD 500GB</option>
                            <option value="HDD 1TB">HDD 1TB</option>
                        </select>
                    </div>
                </div>
                <h3>Datos de Software</h3>
                <div class="datos">
                    <div class="box">
                        <label for="sistema">Sistema Operativo</label>
                        <select id="sistema" name="sistema">
                            <option value="Windows 10">Windows 10</option>
                            <option value="Windows 11">Windows 11</option>
                        </select>
                    </div>
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
            </div> <!--laptop-->
        </form>
        <script src="../js/peticiones.js"></script>
    </div>

</body>

</html>