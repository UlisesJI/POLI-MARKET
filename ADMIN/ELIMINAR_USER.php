<?php 

include("conexion.php");

$admin=$_GET['admin'];
$user=$_GET['user'];

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

$sql = "SELECT * FROM clientes WHERE usuario='$user'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 1){

    
    $sql = "DELETE FROM clientes WHERE usuario='$user'";
    $query = mysqli_query($conn, $sql);

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert11.js"></script>
    <?php


}else{

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert11.js"></script>


<?php

}

?>
<script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                      setTimeout( function() { window.location.href = "PRINCIPAL_ADMIN.php?admin=<?=$admin?>"; }, 1600 );
                    </script> 
</body>
</html>
