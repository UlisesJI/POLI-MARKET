<?php

include("conexion.php");

class TOKENS
{
  private $session_key;
  private $db_key;
 
  private function generaTokens($user)
  {
    $configargs = array(
        "config" => "KEYS/openssl.cnf",
        'private_key_bits' => 2048,
        'default-md' => "sha256"
        
        );
        
    $generar=openssl_pkey_new($configargs);
    openssl_pkey_export($generar, $keypriv,NULL, $configargs);
    $keypub=openssl_pkey_get_details($generar);
    file_put_contents('KEYS/privada'.$user.'.key',$keypriv);
    file_put_contents('KEYS/publica'.$user.'.key',$keypub['key']);
    
    $this->session_key = 'KEYS/publica'.$user.'.key';
    
  }
  
  public function subirToken($user)
  {
    include("conexion.php");
    $key = $this->db_key = 'KEYS/privada'.$user.'.key';
    $query =  "INSERT INTO TOKENS VALUES ('$user', '$key')";
    $result = mysqli_query($conn, $query);
  }
  
  
  
  public function getSession($user)
  {
    $this->generaTokens($user);
    return $this->session_key;
  }
  
  
 
}
?>