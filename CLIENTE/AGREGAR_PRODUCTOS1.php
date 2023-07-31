<?php

include("conexion.php");

include("VALIDAR_SESION.php");

$user=mysqli_real_escape_string($conn, $_GET['user']);

session_start();

$key= $_SESSION['key'];

$a = new VALIDAR();
$cifrada= $a -> encriptar($key,$user);
$validacion= $a -> validar($cifrada, $user);

?>
<html>
    <head>
        <title>Poli-Market</title>                                     <!-- titulo de pestaña -->
        <meta charset="UTF-8">                                                          
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <link rel="stylesheet" href="AGREGAR_PRODUCTO.css">
        <link rel="icon" href="img/icono.png">     
        <!-- Logo pestaña -->
        <script>
        var user = urlParams.get('user');
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
    <!-- cuerpo de pagina -->
        <div class="principal">
            <div id="container">
                <h1> Empezar a Vender </h1>
                <img src="img/Logo_PoliMarket.png" alt="">
                
                <form action="AGREGAR_PRODUCTOS.php?user=<?=$user?>" method="post" id="contact_form" enctype="multipart/form-data" name="form" >
                  <div class="nombre">
                    <label for="name"></label>
                    <input type="text" placeholder="NOMBRE" name="nombre" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC]+$" id="name_input" required>
                  </div>
                  <div class="precio">
                    <label for="precio"></label>
                    <input type="number" placeholder="PRECIO" name="precio"  min="1" max="999999" required>
                  </div>
                  <div class="stock">
                    <label for="stock"></label>
                    <input type="number" placeholder="STOCK" name="stock"  min="1" max="999" required>
                  </div>
                  <div class="especificacion">
                    <label for="especificacion"></label>
                    <input type="text" placeholder="ESPECIFICACIONES" name="especificacion" id="email_input" required>
                  </div> 
                  <div class="descripción">
                    <label for="descripción"></label>
                    <input type="text" placeholder="DESCRIPCIÓN" name="descripcion" id="email_input" required>
                  </div>
                  <div class="foto1">
                    <label for="foto1">SELECCIONA TRES FOTOS DEL PRODUCTO</label><br><br>
                    <input type="file"  name="foto1" id="email_input" required>
                    <input type="file"  name="foto2" id="email_input" required>
                    <input type="file"  name="foto3" id="email_input" required>
                  </div>
                  <select name="CATEGORIA" style="color: #000000" required>
                <option value="">Selecciona una categoria?</option>
                <option value="Matematicas">Matematicas</option>
                <option value="Quimica">Quimica</option>
                <option value="Regalos">Regalos</option>
                <option value="Ropa">Ropa</option>
                <option value="Libros">Libros</option>
                <option value="Dibujo Tecnico">Dibujo Tecnico</option>
                <option value="Fisica">Fisica</option>
                <option value="Programacion">Programacion</option>
                <option value="Maquinas">Maquinas</option>
                <option value="Sistemas digitales">Sistemas digitales</option>
            </select>
                    <input type="submit" value="agregar" name="agregar" id="form_button" />
                  
                </form>
              </div>
        </div>
           }else{
    ?>
    <h1>No puedes acceder</h1>
    <?php } ?>
    </body>
</html>