<?php
    include('../includes/utilerias.php');

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    extract($_POST);
    $serie = $_POST['serie'];
    $tipo = $_POST['tipo'];
    $inv = $_POST['inv'];

    // Definir la carpeta de destino
    $carpeta_destino = "../../files/";

    $nombre_archivo = basename($_FILES["archivo"]["name"]);

    // Obtenemos la información sobre el nombre del archivo
    $informacion_archivo = pathinfo($nombre_archivo);

    // Extraemos la extensión del archivo
    $extension = $informacion_archivo["extension"];

    // Concatenamos la palabra "serie" al nombre del archivo
    $nuevo_nombre_archivo = $informacion_archivo["filename"] . uniqid('', true) . '.' . $extension;

    // Validar la extensión del archivo
    if ($extension == "pdf") {


        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nuevo_nombre_archivo)) {
            // Insertar la información del archivo en la base de datos
            $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
            $sql = "INSERT INTO documento (serie, tipoDoc, archivo) 
            VALUES ( '$serie', '$tipo','$nuevo_nombre_archivo')";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
                if ($inv == 'EQUIPO') {
                    if ($tipo == 'baja') {
                        $sql = "UPDATE equipo SET baja = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else {
                        $sql = "UPDATE equipo SET resguardo = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    }
                    redireccionar('Archivo guardado exitósamente', '../hubDocs.php?id=' . $serie . '&inv=EQUIPO');
                } else if ($inv == 'IMPSCA') {
                    if ($tipo == 'baja') {
                        $sql = "UPDATE impsca SET baja = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else if ($tipo == 'resguardo') {
                        $sql = "UPDATE impsca SET resguardo = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else {
                        $sql = "UPDATE impsca SET garantia = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    }
                    redireccionar('Archivo guardado exitósamente', '../hubDocs.php?id=' . $serie . '&inv=IMPSCA');
                } else if ($inv == 'LAPTOP') {
                    if ($tipo == 'baja') {
                        $sql = "UPDATE laptop SET baja = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else if ($tipo == 'resguardo') {
                        $sql = "UPDATE laptop SET resguardo = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else {
                        $sql = "UPDATE laptop SET garantia = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    }
                    redireccionar('Archivo guardado exitósamente', '../hubDocs.php?id=' . $serie . '&inv=LAPTOP');
                } else if ($inv == 'UPS') {
                    if ($tipo == 'baja') {
                        $sql = "UPDATE ups SET baja = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else if ($tipo == 'resguardo') {
                        $sql = "UPDATE ups SET resguardo = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    } else {
                        $sql = "UPDATE ups SET garantia = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                        $resultado = mysqli_query($conexion, $sql);
                    }
                    redireccionar('Archivo guardado exitósamente', '../hubDocs.php?id=' . $serie . '&inv=UPS');
                } else {
                    $sql = "UPDATE telefonia SET baja = '$nuevo_nombre_archivo' WHERE serie = '$serie'";
                    $resultado = mysqli_query($conexion, $sql);
                    redireccionar('Archivo guardado exitósamente', '../hubDocs.php?id=' . $serie . '&inv=TELEFONIA');
                }
            } else {
                echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('../inicio.php');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            location.assign('../inicio.php');
            </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('Solo se permiten archivos PDF.');
        location.assign('../inicio.php');
        </script>";
    }
}
