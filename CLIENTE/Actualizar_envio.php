<?php 

include("conexion.php");

$producto=$_GET['producto'];
$compra=$_GET['compra'];
$user=$_GET['user'];

session_start();

$key= $_SESSION['key'];

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
  
  $sql = "SELECT * FROM compras_producto WHERE id_compra='$compra' and cod_producto='$producto'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 1){
    
    $sql2 = "UPDATE compras_producto SET estado='Enviado' Where id_compra='$compra' and cod_producto='$producto'";
    $query2 = mysqli_query($conn, $sql2);
    
    
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert11.js"></script>
    <?php
    
}else{

    

}

  ?>  
  <script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTO_USUARIO.php?producto=<?=$producto?>&user=<?=$user?>"; }, 3000 );
                    </script> 
</body>
</html>