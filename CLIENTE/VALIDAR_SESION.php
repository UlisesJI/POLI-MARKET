<?php

include("conexion.php");

class VALIDAR{
    
    private $session_key;
    
    public function encriptar($pub,$datos)
  {
    $keypublica=openssl_pkey_get_public(file_get_contents("$pub"));
    openssl_public_encrypt($datos,$datos_cifrados,$keypublica);
    return $datos_cifrados;
  }
  
  private function desencriptar($datos_cifrados, $user)
  {
    include("conexion.php");
    $query="SELECT * FROM TOKENS WHERE usuario='$user' ";
    $result = mysqli_query($conn, $query);
    $row =  mysqli_fetch_array($result);
    $key= $row['token'];
    $keyprivada=openssl_pkey_get_private(file_get_contents("$key"));
    openssl_private_decrypt($datos_cifrados,$datos_decifrados,$keyprivada);
    return $datos_decifrados;
  }
  
  public function validar($datos_cifrados, $user)
  {
    $descifrado=$this->desencriptar($datos_cifrados, $user);
    $valida=false;
    if($user==$descifrado){
        $valida=true;
    }
    
    return $valida;
    
}}
   