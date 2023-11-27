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
    <title>Insertar Usuarios</title>
</head>
<body>
  <div class="container">
  <h1>Directorio de usuarios</h1>
    <form action="../php/tools/insertar_datos_utilerias.php" method="post">
      <div>
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <div>
        <label for="pass">Contraseña:</label>
        <input type="text" id="pass" name="pass" required>
      </div>
      <div>
        <label for="tipo_usuario">Tipo de usuario:</label>
            <select id="tipo_usuario" name="tipo_usuario">
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>
</html>