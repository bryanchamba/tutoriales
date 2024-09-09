<?php
//Conexión base de datos.
$conexion = mysqli_connect('127.0.0.1', 'usuario', '123', 'publico', '3306');

//Validación sencilla, para verificar si se realizo la conexión.
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

//Tomamos los valores que vienes desde la petición y los asignamos a variables.
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

//Formamos el SQL con los valores correspondientes.
$sql = "INSERT INTO bodega (codigo_producto, cantidad) VALUES ('$producto', $cantidad)";

//Con la función -mysqli_query- ejecutamos el sql y verificamos si todo salió bien.
if (mysqli_query($conexion, $sql)) {
    //En caso de que todo este bien, imprimimos mesaje de exito y en este caso, agregamos un boton para regresar al -index.php-
    echo "Nuevo registro insertado correctamente.
    <a href=\"index.php\">Aceptar</a>";
} else {
    //Imprimimos el error en caso de que algo no este bien.
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

//Cerramos la conexión a la base de datos
mysqli_close($conexion);