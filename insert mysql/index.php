<?php

$conexion = mysqli_connect('127.0.0.1', 'usuario', '123', 'publico', '3306');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function chgSelect(){
            let destino = document.getElementById('select_change');
            destino.innerHTML = '¡A seleccionado un producto!';
        }
    </script>
</head>
<body>
    <form action="insertar.php" method="post">

        <label for="producto">Producto</label>
        <select name="producto" id="producto" onchange="chgSelect();" required>
            <option value="" disabled selected>Seleccionar</option>
            <?php
            $sql = "SELECT codigo, nombre FROM productos";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<option value=\"" . $fila['codigo'] . "\">" . $fila['nombre'] . "</option>";
            }
            ?>
        </select>
        <span id="select_change">...</span>

        <br>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" step="1" value="" required />

        <br>

        <button>Insertar</button>

    </form>
</body>
</html>

<?php $conexion->close(); ?>