<?php

include("conexion.php");

$resultado = array();
$resultado['datos'] = array();
$sql = "SELECT * FROM productos";
$responce = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($responce)){
    $index['cod_producto'] = $row['0'];
    $index['nom_producto'] = $row['1'];
    $index['precio_producto'] = $row['2'];
    $index['espns_producto'] = $row['3'];
    $index['descrip_producto'] = $row['4'];
    $index['num_productos'] = $row['8'];

    // Obtener la ruta de las imágenes
    $foto1 = $row['5'];
    $foto2 = $row['6'];
    $foto3 = $row['7'];

    // Ruta completa de las imágenes
    $index['foto_producto1'] = "http://webpolimarket.com/" . $foto1;
    $index['foto_producto2'] = "http://webpolimarket.com/" . $foto2;
    $index['foto_producto3'] = "http://webpolimarket.com/" . $foto3;

    array_push($resultado['datos'], $index);
}

$resultado["exito"] = "1";
echo json_encode($resultado);
?>
