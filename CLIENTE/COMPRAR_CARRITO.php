<?php 

include("conexion.php");


$user=mysqli_real_escape_string($conn, $_GET['user']);
$total=mysqli_real_escape_string($conn, $_GET['total']);

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




$sql = "SELECT*FROM carrito WHERE usuario='$user'";
$query = mysqli_query($conn, $sql);
$row2= mysqli_fetch_array($query);
$carrito=$row2['id_carrito'];

$sql3 = "SELECT*FROM carrito_producto WHERE id_carrito='$carrito'";
$query3 = mysqli_query($conn, $sql3);



$cod=rand(1, 10000000);
$formated_DATETIME = date('Y-m-d H:i:s');
$sql2 = "INSERT INTO compras VALUES('$cod', '$total','$formated_DATETIME' ,'$user')";
$query2 = mysqli_query($conn, $sql2);




while($row3= mysqli_fetch_array($query3)){
$producto=$row3['cod_producto'];
$stock=$row3['num_productos'];

$sql4 = "SELECT*FROM productos WHERE cod_producto='$producto'";
$query4 = mysqli_query($conn, $sql4);
$row= mysqli_fetch_array($query4);
    
    $cod_p= mysqli_real_escape_string($conn, $row['cod_producto']);
   
    $precio= mysqli_real_escape_string($conn, $row['precio_producto']);
    
    
    
    $sql5 = "INSERT INTO compras_producto VALUES('$cod', '$cod_p','$precio', '$stock', 'Por enviar')";
    $query5 = mysqli_query($conn, $sql5);
    
    $sql6 = "DELETE from carrito_producto WHERE cod_producto='$producto'";
    $query6 = mysqli_query($conn, $sql6);
    
}

  ?> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
         <script >Swal.fire({
  position: 'center-center',
  icon: 'success',
  title: 'Pagaste $<?=$total?>',
  showConfirmButton: false,
  timer: 1500
})</script> 
  <script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTO_USUARIO.php?producto=<?=$producto?>&user=<?=$user?>"; }, 3000 );
                    </script> 
</body>
</html>