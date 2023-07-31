<?php

include("conexion.php");

include("VALIDAR_SESION.php");

$user=mysqli_real_escape_string($conn, $_GET['user']);
$sql3 = "SELECT * FROM carrito WHERE usuario='$user'";
$query3 = mysqli_query($conn, $sql3);
$row3= mysqli_fetch_array($query3);
$id_carrito=$row3['id_carrito'];

session_start();

$key= $_SESSION['key'];

$a = new VALIDAR();
$cifrada= $a -> encriptar($key,$user);
$validacion= $a -> validar($cifrada, $user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/PRINCIPAL_ORDINARIO.css" rel="stylesheet">
</head>

<body>
    <?php
    
    if($validacion==true){
    
    ?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">AYUDA</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">SOPORTE</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <div class="logo-banner">
                        <a href="PRINCIPAL_USUARIO.php?user=<?=$user?>"><img style="width:255px" src="img/Logo_PoliMarket.png" alt=""></a>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
               <form action="BUSCAR_PARAUSUARIO.php?user=<?=$user?>" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="buscar" placeholder="BUSCAR PRODUCTOS">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="LOGIN.html" class="btn border">
                    <i class="fas fa-user text-primary"></i>
                    <span class="badge"><?=$user?></span>
                </a>
                <a href="CART.php?user=<?=$user?>" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">Carrito</span>
                </a>
                <a href="PRINCIPAL_ORDINARIO.php" class="btn border">
                    <i class="fas fa-arrow-right text-primary"></i>
                    <span class="badge">Salir</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categorías</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <?php

                        $sql2 = "SELECT * FROM categoria";
                        $query2 = mysqli_query($conn, $sql2);


                        while($row2 =  mysqli_fetch_array($query2)):
                            ?><a href="CATEGORIA_USUARIO.php?categoria=<?=$row2['id_categoria']?>&user=<?=$user?>" class="nav-item nav-link"><?=$row2['nombre_categoria']?></a><?php
                        endwhile;
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <div class="logo">
                        <a href="PRINCIPAL_ORDINARIO.php"><img style="width:255px" src="img/Logo_PoliMarket.png" alt=""></a>
                    </div>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="PRINCIPAL_USUARIO.php?user=<?=$user?>" class="nav-item nav-link active">INICIO</a>
                            <a href="TIENDA_USUARIO.php?user=<?=$user?>" class="nav-item nav-link">TIENDA</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">VENDER</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="AGREGAR_PRODUCTOS1.php?user=<?=$user?>" class="dropdown-item">AGREGAR PRODUCTO</a>
                                    <a href="PRODUCTOS.php?user=<?=$user?>" class="dropdown-item">GESTIONAR PRODUCTOS</a>
                                    <a href="VENTAS.php?user=<?=$user?>" class="dropdown-item">GESTIONAR VENTAS</a>
                                </div>
                            </div>
                            <a href="VERCOMPRAS.php?user=<?=$user?>" class="nav-item nav-link">COMPRAS</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Por enviar</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Enviados</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                                <?php 
                                $sql6 = "SELECT * FROM cliente_producto WHERE usuario='$user'";
                                $query6 = mysqli_query($conn, $sql6);
                            
                                
                                while($row6= mysqli_fetch_array($query6)):
                                    $producto=$row6['cod_producto'];
                                    $sql7 = "SELECT * FROM compras_producto WHERE cod_producto='$producto' AND estado='Por enviar'";
                                    $query7 = mysqli_query($conn, $sql7);
                                     while($row7= mysqli_fetch_array($query7)):
                                         $producto=$row7['cod_producto'];
                                         $sql8 = "SELECT * FROM productos WHERE cod_producto='$producto'";
                                    $query8 = mysqli_query($conn, $sql8);
                                    $row8= mysqli_fetch_array($query8);
                                    $compra=$row7['id_compra'];
                                    $sql9 = "SELECT * FROM compras WHERE id_compra='$compra'";
                                    $query9 = mysqli_query($conn, $sql9);
                                    $row9= mysqli_fetch_array($query9);
                            ?>
                        <table class="table table-bordered text-center mb-0">
                            
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Numero</th>
                                    <th>Cliente</th>
                                    <th>Estatus</th>
                                    <th>Envío</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                
                                <tr>
                                    <?php
                                    $total=$total+$row5['precio_producto'];
                                    ?>
                                    <td class="align-middle"><img src="<?= $row8['foto_producto1']?>" alt="" style="width: 100px;"></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row8['nom_producto'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row7['num_productos'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row9['usuario'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row7['estado'])?></td>
                                    <td class="align-middle"><a  href="Actualizar_envio.php?user=<?= $user?>&producto=<?= $producto?>&compra=<?=$compra?>" class="btn btn-sm text-dark p-0"><button style="color:white" class="btn btn-sm btn-primary">ENVIAR</button></a></td>
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                        <br>
                        <br>
                         <?php endwhile;?>
                        <?php endwhile;?>
                        
                    </div>
                    <div class="tab-pane fade show active" id="tab-pane-3">
                        <?php 
                                $sql6 = "SELECT * FROM cliente_producto WHERE usuario='$user'";
                                $query6 = mysqli_query($conn, $sql6);
                            
                                
                                while($row6= mysqli_fetch_array($query6)):
                                    $producto=$row6['cod_producto'];
                                    $sql7 = "SELECT * FROM compras_producto WHERE cod_producto='$producto' AND estado='Enviado'";
                                    $query7 = mysqli_query($conn, $sql7);
                                     while($row7= mysqli_fetch_array($query7)):
                                         $producto=$row7['cod_producto'];
                                         $sql8 = "SELECT * FROM productos WHERE cod_producto='$producto'";
                                    $query8 = mysqli_query($conn, $sql8);
                                    $row8= mysqli_fetch_array($query8);
                                    $compra=$row7['id_compra'];
                                    $sql9 = "SELECT * FROM compras WHERE id_compra='$compra'";
                                    $query9 = mysqli_query($conn, $sql9);
                                    $row9= mysqli_fetch_array($query9);
                            ?>
                        <table class="table table-bordered text-center mb-0">
                            
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Numero</th>
                                    <th>Cliente</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                
                                <tr>
                                    <?php
                                    $total=$total+$row5['precio_producto'];
                                    ?>
                                    <td class="align-middle"><img src="<?= $row8['foto_producto1']?>" alt="" style="width: 100px;"></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row8['nom_producto'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row7['num_productos'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row9['usuario'])?></td>
                                    <td class="align-middle"><?= mysqli_real_escape_string($conn, $row7['estado'])?></td>
                                    
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                        <br>
                        <br>
                         <?php endwhile;?>
                        <?php endwhile;?>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                <div class="logo-banner">
                        <a href="#"><img style="width:255px" src="img/Logo_PoliMarket.png" alt=""></a>
                    </div>
                </a>
                <p>Somos una empresa dedicada al desarrollo de software, nuestro objetivo es la calidad e inovación en cada uno de nuestros proyectos.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><span>Mar Mediterráneo 227, Popotla, 11400</span> Ciudad de México, CDMX</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>soportepolimarket@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+52 561 615 0099</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Links Directos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>INICIO</a>
                            <a class="text-dark mb-2" href="TIENDA_USUARIO.php?user=<?=$user?>"><i class="fa fa-angle-right mr-2"></i>NUESTRA TIENDA</a>
                            <a class="text-dark mb-2" href="AGREGAR_PRODUCTOS1.php?user=<?=$user?>"><i class="fa fa-angle-right mr-2"></i>VENDER</a>
                            <a class="text-dark mb-2" href="CART.php?user=<?=$row3['usuario']?>"><i class="fa fa-angle-right mr-2"></i>CARRITO</a>
                           
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Links Directos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>MANUAL DE USUARIO</a>
                            <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>REPORTAR</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">TRABAJA CON NOSOTROS</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" >ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">POLI-MARKET</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>

        $("#confirmdelete").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          
          
        
          function warnBeforeRedirect(linkURL) {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'REGISTRATE PARA ACCEDER A ESTA FUNCIONALIDAD!',
            showConfirmButton: false,
            timer: 1600
          })
            .then((willdelete))
          }
        
    </script>
    <?php
    }else{
    ?>
    <h1>No puedes acceder</h1>
    <?php } ?>
</body>

</html>