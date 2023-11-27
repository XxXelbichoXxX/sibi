<?php
function redireccionar($mensaje, $dir) {
    // Incluir archivos y configuraciones necesarias antes de enviar cualquier salida al navegador
    ?>
    <link rel="stylesheet" href="/css/index.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left"><img src="/img/logo-ine.png" alt="Imagen 1" class="logo-1"></td>
                    <td align="center">
                        <h1><b>Junta Local Ejecutiva del Estado de Nayarit</b></h1>
                    </td>
                    <td align="right"><img src="/img/logo-sibi.png" alt="Imagen 2" class="logo-2"></td>
                </tr>
            </table>
        </header>
        <nav>
            <ul>
                <li><a href="#"></a></li>
                <li class="submenu">
                    <a></a>
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        </nav>
    <?php
    echo '<h1 style="text-align:center">' . $mensaje . '</h1>';
    echo '<h4 style="text-align:center"> Redireccionando... </h4>';
    echo '</div>';
    header('refresh:3,url=' . $dir);
    exit();
}
    function conectar() {
        DEFINE('SERVIDOR','localhost');
        DEFINE('usuario','root');
        DEFINE('PASSWORD','');
        DEFINE('BD','sibi');
        $resultado = mysqli_connect(SERVIDOR, usuario, PASSWORD, BD);
        return $resultado;
    }
    function validar($texto){
        $texto = trim($texto);
        $texto = stripcslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    function subir_imagen($archivo){
        if(empty($archivo)){
            return null;
        }

        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tama = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.',$nombre);

        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension,$extensiones)){
            echo 'Es un archivo no valido';
            return null;
        }else if($error > 0){
            echo 'Hubo un error al cargar la imagen';
            return null;
        }else if($tama > 1000000){
            echo 'El tamaño de la imagen excede 1MB';
            return null;
        }else{
            $nombre_nuevo = uniqid('',true). '.' . $extension;
            $destino = "../img/carga/" . $nombre_nuevo;
            move_uploaded_file($origen,$destino);

            return $destino;
        }

    }
    function subir_archivo($archivo){
        if(empty($archivo)){
            return null;
        }

        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tama = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('pdf');

        $nombre_y_ext = explode('.',$nombre);

        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension,$extensiones)){
            echo 'Es un archivo no valido';
            return null;
        }else if($error > 0){
            echo 'Hubo un error al cargar la imagen';
            return null;
        }else if($tama > 1000000){
            echo 'El tamaño de la imagen excede 1MB';
            return null;
        }else{
            $nombre_nuevo = uniqid('',true). '.' . $extension;
            $destino = "../../img/carga/" . $nombre_nuevo;
            move_uploaded_file($origen,$destino);

            return $destino;
        }

    }

    function crearUsuario($length){
        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern)-1;
        for($i = 0; $i < $length; $i++){
            $key .= substr($pattern, mt_rand(0,$max), 1);
        }
        return $key;
    }
?>