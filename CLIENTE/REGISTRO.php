<?php 

include("conexion.php");

include("TOKENS.php");

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


    $nom= mysqli_real_escape_string($conn, $_POST['nombre']);
    $ape= mysqli_real_escape_string($conn, $_POST['apellidos']);
    $mail= mysqli_real_escape_string($conn, $_POST['email']);
    $tel= mysqli_real_escape_string($conn, $_POST['telefono']);
    $mes= mysqli_real_escape_string($conn, $_POST['MES']);
    $dia= mysqli_real_escape_string($conn, $_POST['DIA']);
    $anio= mysqli_real_escape_string($conn, $_POST['ANO']);
    $user= mysqli_real_escape_string($conn, $_POST['usuario']);
    $boleta= mysqli_real_escape_string($conn, $_POST['boleta']);
    $contra= mysqli_real_escape_string($conn, $_POST['contrasenia']);
    $cod=rand(1, 10000000);
    
    $sql4 = "SELECT * FROM clientes WHERE usuario= '$user' ";
    $query4 = mysqli_query($conn, $sql4);
    $row4 =  mysqli_fetch_array($query4);
    
    if($row4['usuario']==null){
    
    $query =  "INSERT INTO clientes VALUES ('$user', '$nom', '$ape', '$mail', '$tel', '$mes', '$dia', '$anio', '$contra','$boleta',0)";
    $result = mysqli_query($conn, $query);
    
    $a = new TOKENS();
    $a -> subirToken($user);
    
    $to      = $mail; // Enviar Email al usuario
    $subject = 'Verificación'; // Darle un asunto al correo electrónico
    $message = '
     
    Gracias por registrarte!
    Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
     
    ------------------------
    Username: '.$user.'
    Password: '.$contra.'
    ------------------------
     
    Por favor haz clic en este enlace para activar tu cuenta:
    http://webpolimarket.com/activacion.php?mail='.$mail.'
    '; // Aqui se incluye la URL para ir al mensaje
                         
    $headers = 'From:Soporte@webpolimarket.com' . "\r\n"; // Colocar el encabezado
    mail($to, $subject, $message, $headers); // Enviar el correo electrónico

    
    $query =  "INSERT INTO carrito VALUES ('$cod','$user')";
    $result = mysqli_query($conn, $query);
    
    $query =  "INSERT INTO perfil VALUES ('$cod','$user','img/default.png')";
    $result = mysqli_query($conn, $query);

        
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert10.js"></script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert2.js"></script>
               <script type="text/javascript">
                        //Redireccionamiento tras 5 segundos
                        setTimeout( function() { window.location.href = "PRINCIPAL_ORDINARIO.php"; }, 1600 );
                        </script>
        <?php
        
    }
}

?>
</body>
</html>

