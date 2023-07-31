<?php 

include("conexion.php");
include("VALIDAR_SESION.php");

$producto=mysqli_real_escape_string($conn,$_GET['producto']);
$user=mysqli_real_escape_string($conn,$_GET['user']);

session_start();

$key= $_SESSION['key'];
$a = new VALIDAR();
$cifrada= $a -> encriptar($key,$user);
$validacion= $a -> validar($cifrada, $user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if($validacion==true){
    
    ?>
<?php 

$sql = "SELECT * FROM carrito WHERE usuario='$user'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 1){

    $row= mysqli_fetch_array($query);
    $id= $row['id_carrito'];
    $sql = "Delete from carrito_producto where cod_producto='$producto'";
    $query = mysqli_query($conn, $sql);

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert12.js"></script>
    <?php


}else{

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert12.js"></script>


<?php

}

?>
<script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTO_USUARIO.php?producto=<?=$producto?>&user=<?=$user?>"; }, 3000 );
                    </script> 
                    <?php
    }else{
    ?>
    <h1>No puedes acceder</h1>
    <?php } ?>
</body>
</html>
