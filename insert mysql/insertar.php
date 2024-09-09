<?php

$conexion = mysqli_connect('127.0.0.1', 'usuario', '123', 'publico', '3306');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO bodega (codigo_producto, cantidad) VALUES ('$producto', $cantidad)";
if (mysqli_query($conexion, $sql)) {
    echo "Nuevo registro insertado correctamente.
    <a href=\"index.php\">Aceptar</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}


mysqli_close($conexion);