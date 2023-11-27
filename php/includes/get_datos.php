<?php
// Conexión a la base de datos y otras configuraciones

if (isset($_POST['nombreEmpleado'])) {
    $nombreEmpleado = $_POST['nombreEmpleado'];

    // Realiza una consulta a la base de datos para obtener el área y la junta
    $conexion = mysqli_connect("localhost", "root", "", "sibi");

    $sql = "SELECT claveArea, junta FROM empleado WHERE nombreEmpleado = '$nombreEmpleado'";
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $sugerencias = [
            'area' => $fila['claveArea'],
            'junta' => $fila['junta']
        ];

        echo json_encode($sugerencias);
    } else {
        echo json_encode(['area' => '', 'junta' => '']);
    }

    mysqli_close($conexion);
}
?>