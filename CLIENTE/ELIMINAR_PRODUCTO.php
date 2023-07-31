<?php 

include("conexion.php");
include("VALIDAR_SESION.php");

$producto=mysqli_real_escape_string($conn, $_GET['producto']);
$user=mysqli_real_escape_string($conn, $_GET['user']);

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

$sql = "DELETE FROM productos WHERE cod_producto='$producto'";
$query = mysqli_query($conn, $sql);




?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert13.js"></script>
<script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTOS.php?&user=<?=$user?>"; }, 3000 );
                    </script> 
                    <?php
    }else{
    ?>
    <h1>No puedes acceder</h1>
    <?php } ?>
</body>
</html>
