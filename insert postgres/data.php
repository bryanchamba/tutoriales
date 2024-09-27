<?php

class Postgres
{
    private const HOST = 'localhost';
    private const PORT = '5432';
    private const DB = 'postgres';
    private const USER = 'prueba';
    private const PASS = 'prueba';
    
    private $conexion = null;

    function __construct(){
		$this->conexion();
	}

    private function conexion(){
		$this->conexion = pg_connect(
			'host='.self::HOST.
			' port='.self::PORT.
			' user='.self::USER.
			' password='.self::PASS.
			' dbname='.self::DB
		) or die('<b>Error de conexion.</b>');
	}

    public function ejecutar($query){
        $resultado = pg_query($this->conexion, $query);
        return $resultado;
    }
}

$nombre = $_POST['nombre'];
$civil = $_POST['civil'];
$genero = $_POST['genero'];

$postgres = new Postgres();

$query = "
    insert into tbl_clientes (nombre,civil,genero)
    values ('$nombre','$civil','$genero');
";

$resultado = $postgres->ejecutar($query);

echo 
    $resultado !== false && pg_affected_rows($resultado) > 0 ? 
        '¡Registro guardado con exito!' : 
        '¡No se pudo guardar el registro!';