<?php 

include("conexion.php");
include("TOKENS.php");

if(isset($_POST['login'])){

    $user= mysqli_real_escape_string($conn, $_POST['usuario']);
    $contra=mysqli_real_escape_string($conn, $_POST['contrasenia']);

   
    $query="SELECT * FROM clientes WHERE usuario='$user' AND contrasenia_user='$contra' AND estado='1'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        
         $a = new TOKENS(); // $a es un objeto
         $key = $a  -> getSession($user);
        
        session_start();
        
        $_SESSION["key"] = htmlentities($key);
        
        header("Location:PRINCIPAL_USUARIO.php?user=$user");
        
        
    }}


?>
<!DOCTYPE html>
<html lang="en" style="background-color: white"">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    

<?php

if(isset($_POST['login'])){

    $user= mysqli_real_escape_string($conn, $_POST['usuario']);
    $contra=mysqli_real_escape_string($conn, $_POST['contrasenia']);

   
    $query="SELECT * FROM clientes WHERE usuario='$user' AND contrasenia_user='$contra' AND estado='1'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        
        

       ?> <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
                        <script src="alert3.js"></script> 
                        
                        <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "PRINCIPAL_USUARIO.php?user=<?=$user?>"; }, 1600 );
                        </script>
                        
                        <?php

    }else{
        $query="SELECT * FROM admins WHERE administrador='$user' AND contrasenia_admin='$contra'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){

            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
                        <script src="alert3.js"></script> 
                        
                        <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "ADMIN/PRINCIPAL_ADMIN.php?admin=<?=$user?>"; }, 1600 );
                        </script>
            <?php

        }else{
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
                        <script src="alert4.js"></script> 
                        
                        <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "PRINCIPAL_ORDINARIO.php"; }, 1800 );
                        </script>
            <?php
        }
        
    }

}

?>

</body>
</html>
