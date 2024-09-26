<?php
$conexion = pg_connect('
host=localhost
port=5432
dbname=postgres
user=prueba
password=prueba
');

$nombre = $_POST['nombre'];
$civil = $_POST['civil'];
$genero = $_POST['genero'];

$query = "
    insert into tbl_clientes (nombre,civil,genero)
    values ('$nombre','$civil','$genero');
";

pg_query($conexion, $query);

echo 'Registro guardado.';