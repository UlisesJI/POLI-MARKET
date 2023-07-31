<?php 

include("conexion.php");
include("VALIDAR_SESION.php");
$producto=mysqli_real_escape_string($conn, $_GET['producto']);
$user=mysqli_real_escape_string($conn, $_GET['user']);
$stock=mysqli_real_escape_string($conn, $_GET['stock']);

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
  
  $sql = "SELECT * FROM productos WHERE cod_producto='$producto'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 1){

    $row= mysqli_fetch_array($query);
    $cod_p= $row['cod_producto'];
    $cod=rand(1, 10000000);
    $precio= $row['precio_producto'];
    $formated_DATETIME = date('Y-m-d H:i:s');

    $sql2 = "INSERT INTO compras VALUES('$cod', '$precio','$formated_DATETIME' ,'$user')";
    $query2 = mysqli_query($conn, $sql2);
    
    $sql2 = "INSERT INTO compras_producto VALUES('$cod', '$cod_p','$precio', '$stock', 'Por enviar')";
    $query2 = mysqli_query($conn, $sql2);
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
         <script >Swal.fire({
  position: 'center-center',
  icon: 'success',
  title: 'Pagaste $<?=$precio?>',
  showConfirmButton: false,
  timer: 1500
})</script>  
    <?php

}else{

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert7.js"></script>
    <?php

}

  ?>  
  <script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRODUCTO_USUARIO.php?producto=<?=$producto?>&user=<?=$user?>"; }, 3000 );
                    </script> 
</body>
</html>