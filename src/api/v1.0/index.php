<?php

// El once se asegura a que se incluye una vez
require_once '../includes/conexion.php';

define('API_VERSION', 'v1.0');

// Nos muestra la url de la petición
//echo $_SERVER['REQUEST_URI'];

// Parsear la url quedandonos con fragmentos concretos.
//echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

// Saber la versión de la api y mostralo por pantalla
//var_dump(explode(API_VERSION.'/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

// Guardamos el valor de la variable
$uri = explode(API_VERSION.'/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[1];

// Creamos un array separando la url por /
$uri_array = explode('/',$uri);

// Extraer el primer elementos de un array
$recurso = array_shift($uri_array); // ventas

//echo $recurso;

// Guardamos la acción en minúsculas
$operacion = strtolower($_SERVER['REQUEST_METHOD']); // get

$vista = 'json';

$salida = array();

$http_code = 404;

@include "modelos/$operacion-$recurso.php"; // modelos/get-ventas.php

// Corta el flujo de la aplicación, se utiliza para hacer comprobaciones.
//die();

@include "vistas/$vista.php"; // json.php


/* Funcionamiento del principio, se puede eliminar
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
echo json_encode($output);*/