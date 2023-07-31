<?php 

include("conexion.php");

session_start();

$key= $_SESSION['key'];

$user=mysqli_real_escape_string($conn, $_GET['user']);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

if(isset($_POST['agregar'])){


    $nom= mysqli_real_escape_string($conn,$_POST['nombre']);
    $precio=mysqli_real_escape_string($conn, $_POST['precio']);
    $stock= mysqli_real_escape_string($conn,$_POST['stock']);
    $espn= mysqli_real_escape_string($conn,$_POST['especificacion']);
    $descrip= mysqli_real_escape_string($conn,$_POST['descripcion']);
    $imagen1=$_FILES['foto1']['name'];
    $imagen2=$_FILES['foto2']['name'];
    $imagen3=$_FILES['foto3']['name'];
    $cat=mysqli_real_escape_string($conn,$_POST['CATEGORIA']);
    $cod=rand(1, 100);

    $carpeta="img/";
    $ruta1=$_FILES['foto1']['tmp_name'];
    $ruta2=$_FILES['foto2']['tmp_name'];
    $ruta3=$_FILES['foto3']['tmp_name'];
    $src1 = $carpeta.$imagen1;
    move_uploaded_file($ruta1, $src1);
    $ruta2=$_FILES['foto2']['tmp_name'];
    $src2 = $carpeta.$imagen2;
    move_uploaded_file($ruta2, $src2);
    $ruta3=$_FILES['foto3']['tmp_name'];
    $src3 = $carpeta.$imagen3;
    move_uploaded_file($ruta3, $src3);

    $query =  "INSERT INTO productos VALUES ('$cod', '$nom', '$precio', '$espn', '$descrip', 'img/$imagen1', 'img/$imagen2', 'img/$imagen3', '$stock')";
    $result = mysqli_query($conn, $query);
    
    $query =  "INSERT INTO cliente_producto VALUES ('$user','$cod')";
    $result = mysqli_query($conn, $query);
    
    $sql2 = "SELECT * FROM categoria WHERE nombre_categoria='$cat'";
    $query2 = mysqli_query($conn, $sql2);
    $row =  mysqli_fetch_array($query2);
    $catg=$row["id_categoria"];
    
    $query =  "INSERT INTO categoria_producto VALUES ('$cod','$catg')";
    $result = mysqli_query($conn, $query);

        
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
               <script src="alert11.js"></script> 
               <script type="text/javascript">
                       //Redireccionamiento tras 5 segundos
                       setTimeout( function() { window.location.href = "PRINCIPAL_USUARIO.php?user=<?=$user?>"; }, 1600 );
                    </script> 
        <?php
    

}

?>
</body>
</html>