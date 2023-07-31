<?php 

include("conexion.php");
include("VALIDAR_SESION.php");
$user=mysqli_real_escape_string($conn, $_POST['user']);
$producto=mysqli_real_escape_string($conn, $_POST['producto']);
$stock=mysqli_real_escape_string($conn, $_POST['stock']);

session_start();

$key= $_SESSION['key'];
$a = new VALIDAR();
$cifrada= $a -> encriptar($key,$user);
$validacion= $a -> validar($cifrada, $user);

?>
<html style="background-color: black">
    <head>
        <title>Poli-Market</title>                                     <!-- titulo de pestaña -->
        <meta charset="UTF-8">                                                          
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <link rel="stylesheet" href="COMPRA.css">
        <link rel="icon" href="img/icono.png">     
        <!-- Logo pestaña -->
        <script>
            function validar() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['form']['nombre']['apellidos']['mail'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('message');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z]+$', 'i');
      
      if(!pattern.test(input.value)){ 
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }


      // devolvemos el valor de isValid
      return isValid;
    }

    // Por último, nuestra función que verifica si el campo es válido antes de realizar cualquier otra acción.
    function verificar() {
      const valido = validar();
      if (!valido) {
        alert('El campo no es válido.');
      } else {
        alert('El campo es válido');
      }
    }
        </script>
    </head>
    <body>
        <?php
    
    if($validacion==true){
    
    ?>
        <div id="wrapper">
  <div class="row">
    <div class="col-xs-5">
      <div id="cards">
        <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Visa-icon.png">
        <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Master-Card-icon.png">
      </div><!--#cards end-->
      <div class="form-check">
  <label class="form-check-label" for='card'>
    <input id="card" class="form-check-input" type="checkbox" value="">
    
  </label>
</div>
    </div><!--col-xs-5 end-->
    <div class="col-xs-5">
      <div id="cards">
        <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Paypal-icon.png">
      </div><!--#cards end-->
      <div class="form-check">
  <label class="form-check-label" for='paypal'>
    <input id="paypal" class="form-check-input" type="checkbox" value="">

  </label>
</div>
    </div><!--col-xs-5 end-->
  </div><!--row end-->
  <div class="row">
    <div class="col-xs-5">
      <i class="fa fa fa-user"></i>
      <label for="cardholder">Cardholder's Name</label>
      <input type="text" id="cardholder">
    </div><!--col-xs-5-->
    <div class="col-xs-5">
      <i class="fa fa-credit-card-alt"></i>
      <label for="cardnumber">Card Number</label>
      <input type="text" id="cardnumber">
    </div><!--col-xs-5-->
  </div><!--row end-->
  <div class="row row-three">
    <div class="col-xs-2">
      <i class="fa fa-calendar"></i>
      <label for="date">Valid thru</label>
      <input type="text" placeholder="MM/YY" id="date">
    </div><!--col-xs-3-->
    <div class="col-xs-2">
      <i class="fa fa-lock"></i>
      <label for="date">CVV / CVC *</label>
      <input type="text">
    </div><!--col-xs-3-->
    <div class="col-xs-5">
      <span class="small">* CVV or CVC is the card security code, unique three digits number on the back of your card seperate from its number.</span>
    </div><!--col-xs-6 end-->
  </div><!--row end-->
  <footer>
    <button class="btn">Regresar</button>
    <a href="COMPRA2.php?producto=<?=$producto?>&user=<?=$user?>&stock=<?=$stock?>"><button class="btn">Pagar</buton></a>
  </footer>
</div><!--wrapper end-->

        <?php
    }else{
    ?>
    <h1>No puedes acceder</h1>
    <?php } ?>
    </body>
</html>
