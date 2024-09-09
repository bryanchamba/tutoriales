<?php
$conexion = pg_connect('
host=localhost
port=5432
dbname=postgres
user=prueba
password=prueba
');

$nombre = $_POST['nombre'];

$query = "
    insert into tbl_clientes (nombre)
    values ('$nombre');
";

pg_query($conexion, $query);

echo 'Registro guardado.';