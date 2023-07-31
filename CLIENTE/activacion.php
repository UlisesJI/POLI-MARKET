<?php

include("conexion.php");

$mail=$_GET['mail'];
$sql = "UPDATE clientes SET estado='1' WHERE correo_user='$mail'";
$query = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en" style="background-color: white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLI_MARKET</title>
</head>
<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert9.js"></script> 
               <script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "LOGIN.html"; }, 1600 );
                    </script> 
</body>
</html>