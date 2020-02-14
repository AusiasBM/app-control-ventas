<?php

$serverNombre = "localhost";
$userNombre = "root";
$password = "";
$dbNombre = "control_ventas";

// Crear la conexión
$conn = mysqli_connect($serverNombre,
    $userNombre, $password, $dbNombre);

// Chequear la conexión
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `ventas`";
$result = mysqli_query($conn, $sql);

$output = array();

if (mysqli_num_rows($result) > 0) {
    // procesar cada fila
    while($row = mysqli_fetch_assoc($result)) {
        //echo $row["fecha"]. '<br>';
        array_push($output, $row);
    }

} else {
    echo "0 resultados";
}

// recoger el array y lo convierte en una cadena JSON
header('Content-type: application/json');
echo json_encode($output);