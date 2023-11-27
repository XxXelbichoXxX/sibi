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
    <link rel="stylesheet" href="../css/empleados.css">
    <title>Insertar Empleados</title>
</head>
<body>
  <div class="container">
  <h1>Directorio de personal</h1>
    <form action="../php/tools/insertar_datos_personal.php" method="post">
      <div>
        <label for="nombre">Nombre del empleado:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div>
      <label for="area">Area:</label>
                        <select id="area" name="area">
                            <option value="VRFE-VOCAL DEL REGISTRO FEDERAL DE ELECTORES">VRFE-VOCAL DEL REGISTRO FEDERAL DE ELECTORES</option>
                            <option value="VCEYEC-VOCAL DE CAPACITACION ELECTORAL Y EDUCACION CIVICA">VCEYEC-VOCAL DE CAPACITACION ELECTORAL Y EDUCACION CIVICA</option>
                            <option value="VE-VOCAL EJECUTIVO">VE-VOCAL EJECUTIVO</option>
                            <option value="VOE-VOCAL DE ORGANIZACION ELECTORAL">VOE-VOCAL DE ORGANIZACION ELECTORAL</option>
                            <option value="VS-VOCAL SECRETARIO">VS-VOCAL SECRETARIO</option>
                            <option value="CA-COORDINADOR ADMINISTRATIVO">CA-COORDINADOR ADMINISTRATIVO</option>
                            <option value="CEVEM-CENTRO DE VERIFICACION Y MONITOREO">CEVEM-CENTRO DE VERIFICACION Y MONITOREO</option>
                            <option value="CS-COMUNICACION SOCIAL">CS-COMUNICACION SOCIAL</option>
                            <option value="UTF-UNIDAD TECNICA DE FISCALIZACION">UTF-UNIDAD TECNICA DE FISCALIZACION</option>
                            <option value="DRF-DEPARTAMENTO DE RECURSOS FINANCIEROS">DRF-DEPARTAMENTO DE RECURSOS FINANCIEROS</option>
                            <option value="DRH-DEPARTAMENTO DE RECURSOS HUMANOS">DRH-DEPARTAMENTO DE RECURSOS HUMANOS</option>
                            <option value="DRM-DEPARTAMENTO DE RECURSOS MATERIALES">DRM-DEPARTAMENTO DE RECURSOS MATERIALES</option>
                            <option value="DS-DEPARTAMENTO DE SISTEMAS">DS-DEPARTAMENTO DE SISTEMAS</option>
                        </select>
      </div>
      <div>
                        <label for="junta">Selecciona una Junta:</label>
                        <select id="junta" name="junta">
                            <option value="Junta Distrital Ejecutiva 01">Junta Distrital Ejecutiva 01</option>
                            <option value="Junta Distrital Ejecutiva 02">Junta Distrital Ejecutiva 02</option>
                            <option value="Junta Distrital Ejecutiva 03">Junta Distrital Ejecutiva 03</option>
                            <option value="Junta Local Ejecutiva">Junta Local Ejecutiva</option>
                        </select>
                    </div>
      <div>
        <label for="cargo">Cargo del empleado:</label>
        <input type="text" id="cargo" name="cargo" required>
      </div>
      <div>
        <label for="email">Email del empleado:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>
</html>