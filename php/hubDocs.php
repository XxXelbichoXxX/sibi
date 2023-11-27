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
    <title>Formato de documentos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/hub.css">
</head>

<body>
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2>Gestor de documentos</h2>
            <br>
            <div>
                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#agregar' style="background-color : #C31C78; border-color: #ABB8C3"> Agregar </button>
                <button type="button" class="btn btn-primary" id="btn-ir-otra-pagina" style="background-color : #C31C78; border-color: #ABB8C3"> Regresar </button>
            </div>
            <br>
            <br>
            <br>


            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#ABB8C3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Serie</th>
                            <th>Tipo de documento</th>
                            <th>Nombre del archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serie = $_GET['id'];
                        $inv = $_GET['inv'];
                        $conexion = mysqli_connect('localhost', 'root', '', 'sibi');
                        $consulta = mysqli_query($conexion, "SELECT * FROM documento where serie = '$serie'");
                        while ($fila = mysqli_fetch_assoc($consulta)) :


                        ?>
                            <tr>
                                <td><?php echo $fila['idDoc']; ?></td>
                                <td><?php echo $fila['serie']; ?></td>
                                <td><?php echo $fila['tipoDoc']; ?></td>
                                <td><?php echo $fila['archivo']; ?></td>
                                <td>
                                    <a href="includes/download.php?id= <?php echo $fila['idDoc']; ?>" class="btn btn-primary" style="background-color : #C31C78; border-color: #ABB8C3;" target="_blank">
                                        <i class="fas fa-download"></i></a>
                                    <a href="includes/delete.php?id=<?php echo $fila['idDoc']; ?>&serie=<?php echo $fila['serie']; ?>&inv=<?php echo $inv; ?>" class="btn btn-primary" style="background-color: #C31C78; border-color: #ABB8C3;">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            <?php endwhile; ?>

                            </tr>
                    </tbody>
                </table>

            </div>
        </div>

</body>
<style>
    .container a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>
<?php include "agregar.php"; ?> 
<script type="text/javascript">
    var invJ = '<?php echo $inv; ?>'
    if (invJ == 'EQUIPO') {
        document.getElementById("btn-ir-otra-pagina").onclick = function() {
            window.location.href = "inventario.php?inv=cpu";
        };
    }else if (invJ == 'LAPTOP') {
        document.getElementById("btn-ir-otra-pagina").onclick = function() {
            window.location.href = "inventario.php?inv=laptop";
        }; 
    }else if (invJ == 'IMPSCA') {
        document.getElementById("btn-ir-otra-pagina").onclick = function() {
            window.location.href = "inventario.php?inv=impresora";
        };
    }else if (invJ == 'TELEFONIA') {
        document.getElementById("btn-ir-otra-pagina").onclick = function() {
            window.location.href = "inventario.php?inv=telefonia";
        };
    }else {
        document.getElementById("btn-ir-otra-pagina").onclick = function() {
            window.location.href = "inventario.php?inv=energia";
        };
    }
</script>

</html>