<?php

include("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>POLI-MARKET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/icono.png">

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
    
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="FAQS.php">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a id="confirm5" class="text-dark" href="">AYUDA</a>
                    <span class="text-muted px-2">|</span>
                    <a id="confirm4" class="text-dark" href="" onclick="">SOPORTE</a>
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
                        <a href="PRINCIPAL_ORDINARIO.php"><img style="width:255px" src="img/Logo_PoliMarket.png" alt=""></a>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="BUSCAR.php?busca=">
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
                    <span class="badge">INICIAR SESIÓN</span>
                </a>
                <a href="REGISTRO.html" class="btn border">
                    <i class="fas fa-plus text-primary"></i>
                    <span class="badge">REGISTRARSE</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categorias</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <?php

                    $sql2 = "SELECT * FROM categoria";
                    $query2 = mysqli_query($conn, $sql2);
                    
                    
                    while($row =  mysqli_fetch_array($query2)):
                        ?><a href="CATEGORIA.php?categoria=<?=$row['id_categoria']?>" class="nav-item nav-link"><?=$row['nombre_categoria']?></a><?php
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
                            <a href="PRINCIPAL_ORDINARIO.php" class="nav-item nav-link active">INICIO</a>
                            <a href="TIENDA.php" class="nav-item nav-link">TIENDA</a>
                            <a href="CONTACTO.php" class="nav-item nav-link">CONTACTANOS</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                           
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/imagen.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Encuentra los mejores productos para ti a un precio accesible</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">COMPRAS SEGURAS</h3>
                                    <a href="" class="btn btn-light py-2 px-3">COMPRA AHORA</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/imagen2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">DA SEGUIMIENTO A TU COMPRA</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">COMPRA FÁCIL</h3>
                                    <a href="" class="btn btn-light py-2 px-3">COMPRA AHORA</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">CALIDAD ASEGURADA</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">SEGUIMIENTO DE COMPRA</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">PAGOS SEGUROS</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">SOPORTE 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="width: 400px;height: 400px;object-fit: cover;" src="img/regalos.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">REGALOS</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="width: 400px;height: 400px;object-fit: cover;" src="img/libros.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">LIBROS</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="width: 400px;height: 400px;object-fit: cover;" src="img/compra.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">LO MÁS COMPRADO</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="width: 400px;height: 400px;object-fit: cover;" src="img/mochilacuadros1.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">MATERIALES</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="width: 400px;height: 400px;object-fit: cover;" src="img/ofertas.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">OFERTAS</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid"  style="width: 400px;height: 400px;object-fit: cover;" src="img/ropa.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">ROPA</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/ofertas.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">APRENDE LO BÁSICO</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Primer Semestre</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">COMPRAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/libro.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">AVANZADO</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Sexto Semestre</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">TE PUEDE INTERESAR</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php

            $sql = "SELECT * FROM productos";
            $query = mysqli_query($conn, $sql);
            
            
            while($row =  mysqli_fetch_array($query)):
                $grupo[] = $row['cod_producto'];
            endwhile;
            
            for($i=0;$i<8;$i++):

                $index = array_rand($grupo,1);
                $code = $grupo[$index];
                $sql2 = "SELECT * FROM productos WHERE cod_producto=$code";
                $query2 = mysqli_query($conn, $sql2);
                $row3 =  mysqli_fetch_array($query2);
                     
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" style="width: 350px;height: 350px;object-fit: cover;"  src="<?= $row3['foto_producto1']?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?=mysqli_real_escape_string($conn, $row3['nom_producto'])?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>MXN $<?= mysqli_real_escape_string($conn, $row3['precio_producto'])?></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="PRODUCTO_ORDINARIO.php?producto=<?= $row3['cod_producto']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>DETALLES</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>AGREGAR AL CARRITO</a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- Products End -->

    <div><a href="#"><p style="font-size:20px; text-align: right; margin-right: 5%; color: red; text-decoration: underline;">VER MÁS</p></a></div>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                <div class="logo-banner">
                        <a href="index.php"><img style="width:255px" src="img/Logo_PoliMarket.png" alt=""></a>
                    </div>
                </a>
                <p>Somos una empresa dedicada al desarrollo de software, nuestro objetivo es la calidad e inovación en cada uno de nuestros proyectos.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><span>Mar Mediterráneo 227, Popotla, 11400</span> Ciudad de México, CDMX</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Soporte@webpolimarket.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+52 561 615 0099</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Links Directos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="PRINCIPAL_ORDINARIO.php"><i class="fa fa-angle-right mr-2"></i>INICIO</a>
                            <a class="text-dark mb-2" href="TIENDA.php"><i class="fa fa-angle-right mr-2"></i>NUESTRA TIENDA</a>
                            <a id="confirm" class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>VENDER</a>
                            <a id="confirm1" class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>CARRITO</a>
                            <a class="text-dark mb-2" href="REGISTRO.html"><i class="fa fa-angle-right mr-2"></i>REGISTRATE</a>
                            <a class="text-dark" href="LOGIN.html"><i class="fa fa-angle-right mr-2"></i>INICIA SESIÓN</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Links Directos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a id="confirm2" class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>MANUAL DE USUARIO</a>
                            <a class="text-dark mb-2" href="CONTACTO.php"><i class="fa fa-angle-right mr-2"></i>CONTACTANOS</a>
                            <a id="confirm3" class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>REPORTAR</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">TRABAJA CON NOSOTROS</h5>
                        <form action="" >
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email"
                                    required="required" />
                            </div>
                            <div>
                                <button  class="btn btn-primary btn-block border-0 py-3" type="submit">ENVIAR</button>
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

        $("#confirm").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          
          $("#confirm1").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          $("#confirm2").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          $("#confirm3").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          $("#confirm4").click(function(e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
          });
          $("#confirm5").click(function(e) {
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
             timer: 1500
          })
          }
        
    </script>
</body>

</html>