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
    $index['foto_producto1'] = $row['5'];
    $index['foto_producto2'] = $row['6'];
    $index['foto_producto3'] = $row['7'];
    $index['num_productos'] = $row['8'];

    array_push($resultado['datos'], $index);
}

$resultado["exito"] = "1";
echo json_encode($resultado);
?>