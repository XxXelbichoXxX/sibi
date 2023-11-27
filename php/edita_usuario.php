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
  <title>Insertar usuarios</title>
</head>

<body>
  <div class="container">
    <h1>Directorio de usuarios</h1>
    <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'sibi');

    $claveUsuario = $_GET['usuario'];

    $sql = "select * from login where usuario='$claveUsuario'";
    $query = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($query);
    ?>
    <form action="../php/tools/edita_datos_utilerias.php" method="post">
      <div>
        <label for="id">id del usuario:</label>
        <input type="text" id="id" name="id" value="<?php echo $row['id'] ?>" readonly>
      </div>
      <div>
        <label for="usuario">Nombre del usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo $row['usuario'] ?>" required>
      </div>
      <div>
        <label for="pass">Contraseña:</label>
        <input type="text" id="pass" name="pass" value="<?php echo $row['pass'] ?>" required>
      </div>
      <div>
      <label for="tipo_usuario">Tipo de usuario:</label>
        <select id="tipo_usuario" name="tipo_usuario">
            <option <?php echo $row['tipo_usuario'] === 'Administrador' ? "selected='selected'" : "" ?>value='Administrador'>Administrador</option>
            <option <?php echo $row['tipo_usuario'] === 'Usuario' ? "selected='selected'" : "" ?>value='Usuario'>Usuario</option>
        </select>
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>

</html>