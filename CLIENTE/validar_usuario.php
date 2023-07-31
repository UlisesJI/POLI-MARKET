<?php
include("conexion.php");


    $usuario=$_POST['usuario'];
    $contrasenia_user=$_POST['contrasenia_user'];
    
    
    $sentencia=$conn->prepare("SELECT * FROM clientes WHERE usuario=? AND contrasenia_user=? AND estado=1");
    $sentencia->bind_param('ss',$usuario,$contrasenia_user);        // el ss es por el tipo de dato de las variables, 
    //<br>                                                           //por lo que da a entender que son dos Strings
    $sentencia->execute();
    
    $resultado = $sentencia->get_result();
    if ($fila = $resultado->fetch_assoc()) {
             echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
    }
    $sentencia->close();
    $conn->close();
    ?>