<?php
require_once 'utilerias.php';
$usuario = $_POST['usuario'];
$passwrd = $_POST['passwrd'];

$conexion = conectar();

$query = "select * from login where BINARY usuario = '$usuario'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    if ($row['pass'] === $passwrd) {
        session_start();
        $_SESSION['user'] = $usuario;
        $_SESSION['role'] = $row['tipo_usuario'];
        header("Location: ../inicio.php");
    } else {
        session_start();
        $_SESSION['error'] = "La contraseña no coincide con la del usuario especificado";
        header("Location: ../index.php");
    }
} else {
    session_start();
    $_SESSION['error'] = "El usuario no fue localizado";
    header("Location: ../index.php");
}

?>