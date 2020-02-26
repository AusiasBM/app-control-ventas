<?php

$sql = 'select * from vendedores';

$res = mysqli_query($conexion, $sql);

while ($fila = mysqli_fetch_assoc($res)){
    array_push($salida, $fila);
}

$http_code = 200;