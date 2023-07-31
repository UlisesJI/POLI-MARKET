<?php 

include("conexion.php");

$user2=$_GET['admin'];
?>
<!DOCTYPE html>
<html lang="en" style="background-color: white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    

<?php

if(isset($_POST['Registrarse'])){


    $nom= $_POST['nombre'];
    $ape= $_POST['apellidos'];
    $mail= $_POST['email'];
    $tel= $_POST['telefono'];
    $mes= $_POST['MES'];
    $dia= $_POST['DIA'];
    $anio= $_POST['ANO'];
    $user= $_POST['usuario'];
    $contra= $_POST['contrasenia'];
    $cod=rand(1, 10000000);
    
    $sql4 = "SELECT * FROM admins WHERE administrador= '$user' ";
    $query4 = mysqli_query($conn, $sql4);
    $row4 =  mysqli_fetch_array($query4);
    
    if($row4['usuario']==null){
    
    $query =  "INSERT INTO admins VALUES ('$user', '$nom', '$ape', '$mail', '$tel', '$mes', '$dia', '$anio', '$contra','Gerente general')";
    $result = mysqli_query($conn, $query);
    
    $query =  "INSERT INTO perfil VALUES ('$cod','$user','img/default.png')";
    $result = mysqli_query($conn, $query);

        
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="../alert1.js"></script>
               <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "PRINCIPAL_ADMIN.php?admin=<?=$user2?>"; }, 1600 );
                        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="../alert2.js"></script>
               <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "PRINCIPAL_ADMIN.php?admin=<?=$user2?>"; }, 1600 );
                        </script>
        <?php
        
    }
}

?>
</body>
</html>

