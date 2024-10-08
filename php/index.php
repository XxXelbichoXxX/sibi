<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia Sesion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">
            
        </div>

        <form action = "includes/login.php" class="formulario" method="post">
            <div class="texto-formulario">
                <h2>Acceso</h2>
                <p>Inicia sesión con tu cuenta</p>
            </div>
            <div class="input">
                <label for="usuario">Nombre de usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" id="usuario" name="usuario">
            </div>
            <div class="input">
                <label for="passwrd">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" id="passwrd" name="passwrd">
            </div>
            <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<label style="color: red;">' . $_SESSION['error'] . '</label>';
                    unset($_SESSION['error']);
                }
            ?>
            <div class="input">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>

</body>

</html>