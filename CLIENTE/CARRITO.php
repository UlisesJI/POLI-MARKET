<?php 

include("conexion.php");

session_start();

$key= $_SESSION['key'];

$user=mysqli_real_escape_string($conn, $_POST['user']);
$producto=mysqli_real_escape_string($conn, $_POST['producto']);
$stock=mysqli_real_escape_string($conn, $_POST['stock']);

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

$sql = "SELECT * FROM carrito WHERE usuario='$user'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 1){

    $row= mysqli_fetch_array($query);
    $id= $row['id_carrito'];
    $sql = "INSERT INTO carrito_producto VALUES('$id', '$producto', '$stock')";
    $query = mysqli_query($conn, $sql);

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="aler5.js"></script>
    <?php


}else{

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert6.js"></script>


<?php

}

?>
<script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTO_USUARIO.php?producto=<?=$producto?>&user=<?=$user?>"; }, 3000 );
                    </script> 
</body>
</html>
