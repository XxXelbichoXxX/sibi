<?php

require 'database.php';

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campo"];

$sql = "SELECT nombreEmpleado FROM empleado WHERE nombreEmpleado LIKE ? ORDER BY nombreEmpleado ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrar('" . $row["nombreEmpleado"]  . "')\">" . $row["nombreEmpleado"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
