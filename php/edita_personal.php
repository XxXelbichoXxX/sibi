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
    <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

    $claveEmpleado = $_GET['id'];

    $sql = "select * from empleado where claveEmpleado='$claveEmpleado'";
    $query = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($query);
    ?>
    <form action="../php/tools/editar_personal.php" method="post">
      <div>
        <label for="nombre">Clave del empleado</label>
        <input type="text" id="claveEmpleado" name="claveEmpleado" value="<?php echo $row['claveEmpleado'] ?>" readonly>
      </div>
      <div>
        <label for="nombre">Nombre del empleado:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombreEmpleado'] ?>" required>
      </div>
      <div>
      <label for="area">Area:</label>
      <select id="area" name="area">
                            <option <?php echo $row['claveArea'] === 'VRFE-VOCAL DEL REGISTRO FEDERAL DE ELECTORES' ? "selected='selected'" : "" ?>value='VRFE-VOCAL DEL REGISTRO FEDERAL DE ELECTORES'>VRFE-VOCAL DEL REGISTRO FEDERAL DE ELECTORES</option>
                            <option <?php echo $row['claveArea'] === 'VCEYEC-VOCAL DE CAPACITACION ELECTORAL Y EDUCACION CIVICA' ? "selected='selected'" : "" ?>value='VCEYEC-VOCAL DE CAPACITACION ELECTORAL Y EDUCACION CIVICA'>VCEYEC-VOCAL DE CAPACITACION ELECTORAL Y EDUCACION CIVICA</option>
                            <option <?php echo $row['claveArea'] === 'VE-VOCAL EJECUTIVO' ? "selected='selected'" : "" ?>value='VE-VOCAL EJECUTIVO'>VE-VOCAL EJECUTIVO</option>
                            <option <?php echo $row['claveArea'] === 'VOE-VOCAL DE ORGANIZACION ELECTORAL' ? "selected='selected'" : "" ?>value='VOE-VOCAL DE ORGANIZACION ELECTORAL'>VOE-VOCAL DE ORGANIZACION ELECTORAL</option>
                            <option <?php echo $row['claveArea'] === 'VS-VOCAL SECRETARIO' ? "selected='selected'" : "" ?>value='VS-VOCAL SECRETARIO'>VS-VOCAL SECRETARIO</option>
                            <option <?php echo $row['claveArea'] === 'CA-COORDINADOR ADMINISTRATIVO' ? "selected='selected'" : "" ?>value='CA-COORDINADOR ADMINISTRATIVO'>CA-COORDINADOR ADMINISTRATIVO</option>
                            <option <?php echo $row['claveArea'] === 'CEVEM-CENTRO DE VERIFICACION Y MONITOREO' ? "selected='selected'" : "" ?>value='CEVEM-CENTRO DE VERIFICACION Y MONITOREO'>CEVEM-CENTRO DE VERIFICACION Y MONITOREO</option>
                            <option <?php echo $row['claveArea'] === 'CS-COMUNICACION SOCIAL' ? "selected='selected'" : "" ?>value='CS-COMUNICACION SOCIAL'>CS-COMUNICACION SOCIAL</option>
                            <option <?php echo $row['claveArea'] === 'UTF-UNIDAD TECNICA DE FISCALIZACION' ? "selected='selected'" : "" ?>value='UTF-UNIDAD TECNICA DE FISCALIZACION'>UTF-UNIDAD TECNICA DE FISCALIZACION</option>
                            <option <?php echo $row['claveArea'] === 'DRF-DEPARTAMENTO DE RECURSOS FINANCIEROS' ? "selected='selected'" : "" ?>value='DRF-DEPARTAMENTO DE RECURSOS FINANCIEROS'>DRF-DEPARTAMENTO DE RECURSOS FINANCIEROS</option>
                            <option <?php echo $row['claveArea'] === 'DRH-DEPARTAMENTO DE RECURSOS HUMANOS' ? "selected='selected'" : "" ?>value='DRH-DEPARTAMENTO DE RECURSOS HUMANOS'>DRH-DEPARTAMENTO DE RECURSOS HUMANOS</option>
                            <option <?php echo $row['claveArea'] === 'DRM-DEPARTAMENTO DE RECURSOS MATERIALES' ? "selected='selected'" : "" ?>value='DRM-DEPARTAMENTO DE RECURSOS MATERIALES'>DRM-DEPARTAMENTO DE RECURSOS MATERIALES</option>
                            <option <?php echo $row['claveArea'] === 'DS-DEPARTAMENTO DE SISTEMAS' ? "selected='selected'" : "" ?>value='DS-DEPARTAMENTO DE SISTEMAS'>DS-DEPARTAMENTO DE SISTEMAS</option>
                        </select>
      </div>
      <div>
                        <label for="junta">Selecciona una Junta:</label>
                        <select id="junta" name="junta">
                          <option <?php echo $row['claveArea'] === 'Junta Distrital Ejecutiva 01' ? "selected='selected'" : "" ?>value='Junta Distrital Ejecutiva 01'>Junta Distrital Ejecutiva 01</option>
                          <option <?php echo $row['claveArea'] === 'Junta Distrital Ejecutiva 02' ? "selected='selected'" : "" ?>value='Junta Distrital Ejecutiva 02'>Junta Distrital Ejecutiva 02</option>
                          <option <?php echo $row['claveArea'] === 'Junta Distrital Ejecutiva 03' ? "selected='selected'" : "" ?>value='Junta Distrital Ejecutiva 03'>Junta Distrital Ejecutiva 03</option>
                          <option <?php echo $row['claveArea'] === 'Junta Local Ejecutiva' ? "selected='selected'" : "" ?>value='Junta Local Ejecutiva'>Junta Local Ejecutiva</option>
                        </select>
                    </div>
              <div>
                <label for="cargo">Cargo del empleado:</label>
                <input type="text" id="cargo" name="cargo" value="<?php echo $row['cargo'] ?>" required>
              </div>
              <div>
                <label for="email">Email del empleado:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['correo'] ?>" required>
              </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>

</html>