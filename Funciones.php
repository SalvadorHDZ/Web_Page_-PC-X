<?php
    session_start();
    //Usuario no autenticado
    function NavBar_NoAutenticado(){
?>
    <!--Barra de navegacion de la pagina para NoAutenticados-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container-xl">
            <!--Seccion del Logo de la pagina -->
            <img style="height: 55px;" src="../img/Logotipo_1.png" alt="LogotipoPS_X."> <!--logotipo de la pagina-->
            <!-- <i class="bi bi-pc-display-horizontal" id="compu"></i> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="Roll-out_bar"><i class="fas fa-align-justify"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--Barra de navegacion Links-->
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/PaginaPrincipal.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/login.php">Productos\Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Noticias.php">Galeria\Noticias</a>
                    </li>
                    <!--Busqueda de la pagina-->
                    <form class="d-flex">
                        <input class="form-control" type="Busqueda" placeholder="Busqueda">
                        <button class="btn botonBusqueda" type="submit"><i class="fal fa-search"></i></button>
                    </form>
                    <li class="nav-item"><!--Carrito de compras-->
                        <a class="nav-link" href="../PaginaPrincipal/login.php"><i class="fal fa-shopping-cart ShopingCar"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Login.php">Inicia Sesión</a>
                    </li>
            </div>
        </div>
    </nav>
<?php
    }
?>
<!--Usuario Autenticado-->
<?php
    function NavBar_Autenticado(){
?>
    <!--Barra de navegacion de la pagina para Autenticados-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container-xl">
            <!--Seccion del Logo de la pagina -->
            <img style="height: 55px;" src="../img/Logotipo_1.png" alt="LogotipoPS_X."> <!--logotipo de la pagina-->
            <!-- <i class="bi bi-pc-display-horizontal" id="compu"></i> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="Roll-out_bar"><i class="fas fa-align-justify"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--Barra de navegacion Links-->
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/PaginaPrincipal.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Productos.php">Productos\Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Noticias.php">Galeria\Noticias</a>
                    </li>
                    <!--Busqueda de la pagina-->
                    <form class="d-flex">
                        <input class="form-control" type="Busqueda" placeholder="Busqueda">
                        <button class="btn botonBusqueda" type="submit"><i class="fal fa-search"></i></button>
                    </form>
                    <?php 
                                // include("../Funciones_Comunes.php");
                            if(!isset($_SESSION['idU'])){
                                header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                            }
                            $c = mysqli_connect("localhost","root","","proyecto-final");
                            $CantidadT =0;
                            $qry ="SELECT * FROM carrito WHERE idUsuario=".$_SESSION["idU"];
                            $rs = mysqli_query($c, $qry);
                            // $CantidadT += $carrito["Cantidad"];
                            if(mysqli_num_rows($rs)>0){
                                while($carrito = mysqli_fetch_array($rs)){
                                    // $qry2 ="SELECT * FROM productos WHERE idProducto=".$carrito['idProducto'];
                                    // $rs2 = mysqli_query($c, $qry2);
                                    $CantidadT += $carrito["Cantidad"];
                                }
                        ?>
                    <li class="nav-item"><!--Carrito de compras-->
                        <a class="nav-link" href="../PaginaPrincipal/Carrito.php"><i class="fal fa-shopping-cart ShopingCar"></i><?php echo $CantidadT; ?></a>
                    </li>
                    <?php 
                            }
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Setings.php"><?php echo $_SESSION['nombre'];?></a>
                    </li>
            </div>
        </div>
    </nav>
<?php
    }
?>
<!--Usuario Autenticado Administrador -->
<?php
    function NavBar_Administrador(){
?>
        <!--Barra de navegacion de la pagina para Administradores-->
    <nav class="navbar Nav_Admi navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container-xl">
            <!--Seccion del Logo de la pagina -->
            <img style="height: 55px;" src="../img/Logotipo_1.png" alt="LogotipoPS_X."> <!--logotipo de la pagina-->
            <!-- <i class="bi bi-pc-display-horizontal" id="compu"></i> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="Roll-out_bar"><i class="fas fa-align-justify"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--Barra de navegacion Links-->
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/PaginaPrincipal.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Productos.php">Productos\Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PaginaPrincipal/Noticias.php">Galeria\Noticias</a>
                    </li>
                    <!--Busqueda de la pagina-->
                    <form class="d-inline-flex">
                        <input class="form-control" type="Busqueda" placeholder="Busqueda">
                        <button class="btn botonBusqueda" type="submit"><i class="fal fa-search"></i></button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="Setings_Admi.php"><?php echo $_SESSION['nombre'];?><p style="font-size: 10px;">Admi</p></a>
                    </li>
            </div>
        </div>
    </nav>
<?php
    }
?>
<!-- Footers de la pagina -->
<?php
    function footer_NoAutenticado(){
?>
<!--Footer de la pagina No Autenticada-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img style="height: 55px;" src="../img/Logotipo_2.png" alt="LogotipoPS_X.">
                <p class="pt-3">Computadoras y Accesroios PC X.®</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Apartados</h5>
                <ul class="texte-uppercase list-unstyled">
                    <li><a href="../PaginaPrincipal/PaginaPrincipal.php">Home</a></li>
                    <li><a href="../PaginaPrincipal/Productos.php">Productos</a></li>
                    <li><a href="../PaginaPrincipal/Noticias.php">Galeria</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5>Contactanos</h5>
                <div>
                    <h6>Telefono</h6>
                    <p>444-110-87-60 ó 444-809-5243</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <div>
                    <h6>Direccion</h6>
                    <p>Enrique Contreras #708 <br> 
                    Col.Arboleda C.P 78456 <br>
                    Guadalajara, Jalisco, México</p>
                </div>
                <div>
                    <h6>Email</h6>
                    <p>ventas@PCX.mx</p>
                </div>
            </div>
        </div>

        <div class="Derechos mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-6 col-12">
                    <img style="width: 195px; background-color: rgba(249,228,183,0.3);" src="../img/Pagos_Img.png" alt="PagosAceptados">
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-nowrap">
                    <p>PC X. eCommerce © 2021.All Right Reserved</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
<?php
    }
?>
<?php
    function footer_Autenticado(){
?>
<!--Footer de la pagina Autenticada-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img style="height: 55px;" src="../img/Logotipo_2.png" alt="LogotipoPS_X.">
                <p class="pt-3">Computadoras y Accesroios PC X.®</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Apartados</h5>
                <ul class="texte-uppercase list-unstyled">
                    <li><a href="../PaginaPrincipal/PaginaPrincipal.php">Home</a></li>
                    <li><a href="../PaginaPrincipal/Productos.php">Productos</a></li>
                    <li><a href="../PaginaPrincipal/Noticias.php">Galeria\Noticias</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5>Contactanos</h5>
                <div>
                    <h6>Telefono</h6>
                    <p>444-110-87-60 ó 444-809-5243</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <div>
                    <h6>Direccion</h6>
                    <p>Enrique Contreras #708 <br> 
                    Col.Arboleda C.P 78456 <br>
                    Guadalajara, Jalisco, México</p>
                </div>
                <div>
                    <h6>Email</h6>
                    <p>ventas@PCX.mx</p>
                </div>
            </div>
        </div>

        <div class="Derechos mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-6 col-12">
                    <img style="width: 195px; background-color: rgba(249,228,183,0.3);" src="../img/Pagos_Img.png" alt="PagosAceptados">
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-nowrap">
                    <p>PC X. eCommerce © 2021.All Right Reserved</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
<?php
    }
?>
<!-- ----------------------------------------------- -->
<!-- Contenido de la pagina principal para usuario Autenticado, No autenticado y Administrador -->
<?php
    function Pag_Principal(){
?>
    <!--Seccion de publicidad/ventas-->
    <section id="Home">
        <div class="container">
            <h5>Adentrate al GAMING</h5>
            <h1><span>Mejores Marcas</span> Para juegos</h1>
            <p>
                El momento es ahora, prueba las mejores marcas <br>
                a los mejores precios este año.
            </p>
        </div>
    </section>
    
    <!--Marcas de la pagina-->
    <section id="marcas">
        <div class="renglon m-0 py-2">
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/Asus_Rog_Logo.png"/>
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/EVGA_Logo.png" alt="EVGA">
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/Razer_Logo.png" alt="RAZER">
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/AMD_Logo.png" alt="AMD">
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/Aorus_Logo.png" alt="AORUS">
            <img class="img-fluid col-lg-1 col-md-4 col-6" src="../img/Marcas/Intel_Logo.png" alt="AORUS">
        </div>
    </section>
    
    <!--Seccion de Noticias-->
    <section id="News" class="w-100 ">
        <div class="row p-0 m-0">
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid p-0 m-0" src="../img/News/Ensamble_PC.jpg" alt="Ensamble_PC">
                <div class="detalles p-0 m-0">
                    <h2>Ensamble Gratuito!</h2>
                    <p>En la compra de todos los componentes <br>
                    de una computadora de Escritorio.</p>
                    <a href="../PaginaPrincipal/Productos.php"> <button class="text-uppercase">Servicios</button></a>
                    
                </div>
            </div>
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid p-0 m-0" src="../img/News/Tarjetas Grafcias-arrived.jpeg" alt="Tarjeta_Grafica">
                <div class="detalles p-0 m-0">
                    <h2>Nuevas Tarjetas Graficas</h2>
                    <p>La nueva generacion de Tarjetas Graficas<br>
                    esta a punto de llegar.</p>
                    <a href="../PaginaPrincipal/Productos.php"><button class="text-uppercase">Productos</button></a>
                </div>
            </div>
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid p-0 m-0" src="../img/News/Luces RGB.png" alt="Luces RGB">
                <div class="detalles p-0 m-0">
                    <h2>Ponle color a tu juego</h2>
                    <p>Ya disponible set de luces RGB para tu Setup Gamer,<br>
                    te daran un area de juego mas calida.</p>
                    <a href="../PaginaPrincipal/Productos.php"><button class="text-uppercase">Productos</button></a>
                </div>
            </div>
        </div>
    </section>
    
    <!--Seccion de Ventas Destacadas 1-->
    <section id="Ventas" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Ventas Destacadas</h3>
                <hr class="mx-auto">
                <p>Estos son los productos mas vendidos</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Procesador-i9_Intel.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">Intel i9 9na Gen</h5>
                <h4 class="pro-precio">$9,500.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Mouse-Gamer-Logitech-G502.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">Logitech G502 Hero</h5>
                <h4 class="pro-precio">$1,800.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Tarjeta_3080.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">MSI Gaming GeForce RTX 3060</h5>
                <h4 class="pro-precio">$28,800.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Fuente_de_Poder-EVGA.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">EVGA 1000W G5 Gold</h5>
                <h4 class="pro-precio">$5,700.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
        </div>
    </section>
    
    <!--Seccion Para venta/promocion-->
    <section id="Promo" class="my-5 py-5">
        <div class="container">
            <h4>Actualiza tu SetUp Gaming</h4>
            <h1><span>No te quedes atras y</span><br> 
                consigue la victoria</h1>
                <a href="../PaginaPrincipal/Productos.php"><button class="texte-uppercase">Productos</button></a>
        </div>
    </section>
    
    <!--Seccion de Ventas Destacadas 2-->
    <section id="Ventas" class="my-5 py-1">
        <div class="container text-center mt-5 py-5">
            <h3>No te pierdas estos productos</h3>
                <hr class="mx-auto">
                <p>Los mejores precios del mercado</p>
        </div>
        <div class="row mx-auto container-fluid py-4">
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/amd ryzen 5_2.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">AMD Razen 5 5600X</h5>
                <h4 class="pro-precio">$6,800.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Razer Deathadder V2 Img_2.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">Razer Deathadder V2</h5>
                <h4 class="pro-precio">$1,090.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Hyperx Alloy Fps Pro_2.png" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">Teclado HyperX Alloy FPS Pro</h5>
                <h4 class="pro-precio">$2,860.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="../img/Ventas Destacadas/Tarjeta_2060_2.jpg" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name">MSI Gaming GeForce RTX 2060 6GB</h5>
                <h4 class="pro-precio">$24,999.00</h4>
                <a href="../PaginaPrincipal/Productos.php"><button class="btn-compra">Ver Mas</button></a>
            </div>
        </div>
    </section>
<?php
    }
?>
<!-- Pagina de productos / Servicios para usuario Autenticado-->
<?php
    function Produ_Servi(){
?>
    <!--Seccion de Servicios de la pagina-->
    <section id="Ventas" class="my-5 py-3">
            <div class="container mt-5 py-5">
                <h3>Sección de Servicios</h3>
                    <hr>
                    <p>Servicios hechos por gente profesional</p>
            </div>
            <div class="row mx-auto Prod_Seccion container">
            <?php 
                $qry ="SELECT * FROM productos WHERE Tipo='Servicio'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="producto text-center col-lg-3 col-md-4 col-12">
                        <img style="width: 600px; height: auto; box-sizing: border-box; object-fit: cover;" 
                        class="img-fluid mb-3" src="../Administracion/Imagen.php?idImg=<?php echo $datos["idProducto"]; ?>" alt="Imagen_Producto"> <!-- Imagen del archivo -->
                        <div class="calificacion"> <!--Calificacion en Estrellas-->
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <!-- opcion para agregar al carrito de compras -->
                        <form action="../Administracion/AgregaCarrito.php" method="post">
                        <h5 class="pro-name"><?php echo $datos["Titulo"];?></h5> <!-- Titulo del producto -->
                        <h4 class="pro-precio">$<?php echo $datos["Precio"];?></h4> <!-- Precio del producto -->
                        <button class="btn-compra">Agregar</button>
                        <input type="hidden" name="idProducto" value="<?php echo $datos['idProducto'] ?>">
                        <input type="hidden" name="Precio" value="<?php echo $datos["Precio"] ?>">
                        </form>
                </div>
            <?php
                        }
                    }
            ?>
            </div>
    </section>

    <!--Seccion de Productos-->
    <section id="Ventas" class="my-5 p-1">
        <div class="container mt-5 py-2">
            <h3>Sección de Productos</h3>
            <hr>
            <p>Los mejores precios del mercado</p>
        </div>
        <div class="row mx-auto Prod_Seccion container">
        <?php 
                $qry ="SELECT * FROM productos WHERE Tipo='Producto'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
        ?>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img style="width: 600px; height: auto; box-sizing: border-box; object-fit: cover;" 
                class="img-fluid mb-3" src="../Administracion/Imagen.php?idImg=<?php echo $datos["idProducto"]; ?>" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!-- opcion para agregar al carrito de compras -->
                <form action="../Administracion/AgregaCarrito.php" method="post">
                    <h5 class="pro-name"><?php echo $datos["Titulo"];?></h5>
                    <h4 class="pro-precio">$<?php echo $datos["Precio"];?></h4> 
                    <button class="btn-compra">Agregar</button>
                    <input type="hidden" name="idProducto" value="<?php echo $datos['idProducto'] ?>">
                    <input type="hidden" name="Precio" value="<?php echo $datos["Precio"] ?>">
                </form>
            </div>
            <?php
                        }
                    }
            ?>
        </div>
    </section>
<?php
    }
?>
<!-- Pagina de productos / Servicios para usuario Autenticado-->
<?php
    function Produ_Servi_Admi(){
?>
    <!--Seccion de Servicios de la pagina-->
    <section id="Ventas" class="my-5 py-3">
            <div class="container mt-5 py-5">
                <h3>Sección de Servicios</h3>
                    <hr>
                    <p>Servicios hechos por gente profesional</p>
            </div>
            <div class="row mx-auto Prod_Seccion container">
            <?php 
                $qry ="SELECT * FROM productos WHERE Tipo='Servicio'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="producto text-center col-lg-3 col-md-4 col-12">
                        <img style="width: 600px; height: auto; box-sizing: border-box; object-fit: cover;" 
                        class="img-fluid mb-3" src="../Administracion/Imagen.php?idImg=<?php echo $datos["idProducto"]; ?>" alt="Imagen_Producto"> <!-- Imagen del archivo -->
                        <div class="calificacion"> <!--Calificacion en Estrellas-->
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <!-- opcion para agregar al carrito de compras -->
                        <form action="../Administracion/Eliminar_Prod-Serv.php" method="post">
                            <h5 class="pro-name"><?php echo $datos["Titulo"];?></h5> <!-- Titulo del producto -->
                            <h4 class="pro-precio">$<?php echo $datos["Precio"];?></h4> <!-- Precio del producto -->
                            <button style="background: linear-gradient(to bottom, #ff0000,#881919); color: black;" class="btn-compra Admin_BTN">Eliminar</button>
                            <input type="hidden" name="idProducto" value="<?php echo $datos['idProducto'] ?>">
                        </form>
                </div>
            <?php
                        }
                    }
            ?>
            </div>
    </section>
    <!--Seccion de Productos-->
    <section id="Ventas" class="my-5 p-1">
        <div class="container mt-5 py-2">
            <h3>Sección de Productos</h3>
            <hr>
            <p>Los mejores precios del mercado</p>
        </div>
        <div class="row mx-auto Prod_Seccion container">
        <?php 
                $qry ="SELECT * FROM productos WHERE Tipo='Producto'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
        ?>
            <div class="producto text-center col-lg-3 col-md-4 col-12">
                <img style="width: 600px; height: auto; box-sizing: border-box; object-fit: cover;" 
                class="img-fluid mb-3" src="../Administracion/Imagen.php?idImg=<?php echo $datos["idProducto"]; ?>" alt="Imagen_Producto">
                <div class="calificacion"> <!--Calificacion en Estrellas-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!-- opcion para agregar al carrito de compras -->
                <form action="../Administracion/Eliminar_Prod-Serv.php" method="post">
                    <h5 class="pro-name"><?php echo $datos["Titulo"];?></h5>
                    <h4 class="pro-precio">$<?php echo $datos["Precio"];?></h4> 
                    <button style="background: linear-gradient(to bottom, #ff0000,#881919); color: black;" class="btn-compra Admin_BTN">Eliminar</button>
                    <input type="hidden" name="idProducto" value="<?php echo $datos['idProducto'] ?>">
                </form>
            </div>
            <?php
                        }
                    }
            ?>
        </div>
    </section>
<?php
    }
?>
<!-- Pagina de Galeria / Noticias  para Usuarios no Autenticados y Autenticados-->
<?php
    function Gale_Not(){
?>
    <!-- Seccion donde empiezan las noticias -->
    <section id="News-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Noticias</h2><hr>
    </section>
    <!-- Seccion donde se muestran las noticias -->
    <section id="News-container" class="container pt-5">
        <div class="row">
            <?php 
                $qry2 ="SELECT * FROM noticias WHERE Tipo='Noticia'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry2); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="post col-lg-6 col-md-6 col-12 pb-4">
                    <div class="News-img">
                        <img class="img-fluid w-100 Alto" src="../Administracion/Imagen_Not.php?idImgN=<?php echo $datos["idNoticia"]; ?>" alt="Noticias">
                    </div>
                    <h3 class="text-center font-weight-normal pt-3"><?php echo $datos["Titulo"];?></h3>
                    <p class="text-center"><?php echo $datos["Fecha"];?></p>
                </div>
            <?php 
                        }
                    }
            ?>
        </div>
        <div class="col-lg-12 col-md-12 col-12 pb-3">
                <div class="News-img">
                    <img style="border-radius: 2%;" class="img-fluid w-100" src="../img/Slide_Pc.jpg" alt="Noticias">
                </div>
        </div>
    </section>

    <!-- Seccion donde empieza la galeria -->
    <section id="Fotos-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Galeria</h2><hr>
        <p>Estas son las fotos de la semana</p>
    </section>
    <!-- Seccion donde se muestran las Fotos -->
    <section id="Fotos-container" class="container pt-5">
        <div class="row">
            <?php 
                $qry2 ="SELECT * FROM galeria WHERE Tipo='Galeria'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry2); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="post col-lg-6 col-md-6 col-12 pb-4">
                    <div class="Fotos-img">
                        <img class="img-fluid w-100 Alto" src="../Administracion/Imagen_Gal.php?idImgG=<?php echo $datos["idGaleria"]; ?>" alt="Galeria">
                    </div>
                    <h3 class="text-center font-weight-normal pt-3"><?php echo $datos["Titulo"];?></h3>
                    <p class="text-center"><?php echo $datos["FechaCargado"];?></p>
                </div>
            <?php 
                        }
                    }
            ?>
        </div>
            <!-- <div class="post col-lg-6 col-md-6 col-12 pb-4">
                <div class="Fotos-img">
                    <img class="img-fluid w-100 Alto" src="/Images/Uploads/Insta/Insta_2.jpg" alt="Noticias">
                </div>
                <h3 class="text-center font-weight-normal pt-3">Este es el ganador de el mejor setup de esta semana, esperamos que sigan participando.</h3>
                <p class="text-center">Dic 07, 2021</p>
            </div>
            <div class="post col-lg-6 col-md-6 col-12 pb-4">
                <div class="Fotos-img">
                    <img class="img-fluid w-100 Alto" src="/Images/Uploads/Insta/Insta_3.jpg" alt="Noticias">
                </div>
                <h3 class="text-center font-weight-normal pt-3">Este es el ganador de el mejor setup de esta semana, esperamos que sigan participando.</h3>
                <p class="text-center">Dic 07, 2021</p>
            </div>
            <div class="post col-lg-6 col-md-6 col-12 pb-4">
                <div class="Fotos-img">
                    <img class="img-fluid w-100 Alto" src="/Images/Uploads/Insta/Insta_4.jpg" alt="Noticias">
                </div>
                <h3 class="text-center font-weight-normal pt-3">Este es el ganador de el mejor setup de esta semana, esperamos que sigan participando.</h3>
                <p class="text-center">Dic 07, 2021</p>
            </div> -->
        <div class="col-lg-12 col-md-12 col-12 pb-3">
            <div class="Fotos-img">
                <img style="border-radius: 2%;" class="img-fluid w-100" src="../img/Slide2_Pc.png" alt="Noticias">
            </div>
        </div>
</section>
<?php
    }
?>
<!-- Pagina de Galeria / Noticias  para Usuario Administrador-->
<?php
    function Gale_Not_Admi(){
?>
    <!-- Seccion donde empiezan las noticias -->
    <section id="News-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Noticias</h2><hr>
    </section>
    <!-- Seccion donde se muestran las noticias -->
    <section id="News-container" class="container pt-5">
        <div class="row">
            <?php 
                $qry2 ="SELECT * FROM noticias WHERE Tipo='Noticia'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry2); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="post col-lg-6 col-md-6 col-12 pb-4">
                    <div class="News-img">
                        <img class="img-fluid w-100 Alto" src="../Administracion/Imagen_Not.php?idImgN=<?php echo $datos["idNoticia"]; ?>" alt="Noticias">
                    </div>
                    <h3 class="text-center font-weight-normal pt-3"><?php echo $datos["Titulo"];?></h3>
                    <p class="text-center"><?php echo $datos["Fecha"];?></p>

                    <form class="text-center" action="../Administracion/Eliminar_News.php" method="post">
                        <button style="background: linear-gradient(to bottom, #ff0000,#881919); 
                        color: black;
                        padding:5px 8px;
                        margin: 2px;
                        border: 1px solid transparent;
                        border-radius: 2%;" 
                        class="btn-compra Admin_BTN">Eliminar</button>
                        <input type="hidden" name="idNoticia" value="<?php echo $datos['idNoticia']; ?>">
                    </form>
                </div>
            <?php 
                        }
                    }
            ?>
        </div>
        <div class="col-lg-12 col-md-12 col-12 pb-3">
                <div class="News-img">
                    <img style="border-radius: 2%;" class="img-fluid w-100" src="../img/Slide_Pc.jpg" alt="Noticias">
                </div>
        </div>
    </section>

    <!-- Seccion donde empieza la galeria -->
    <section id="Fotos-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Galeria</h2><hr>
        <p>Estas son las fotos de la semana</p>
    </section>
    <!-- Seccion donde se muestran las Fotos -->
    <section id="Fotos-container" class="container pt-5">
        <div class="row">
            <?php 
                $qry2 ="SELECT * FROM galeria WHERE Tipo='Galeria'";
                $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
                $rs = mysqli_query($c, $qry2); //Realizamos la query
                    if(mysqli_num_rows($rs)){//Verificamos que halla columnas
                        while($datos = mysqli_fetch_array($rs))//Recorremos la cantidad de columnas.
                        {
            ?>
                <div class="post col-lg-6 col-md-6 col-12 pb-4">
                    <div class="Fotos-img">
                        <img class="img-fluid w-100 Alto" src="../Administracion/Imagen_Gal.php?idImgG=<?php echo $datos["idGaleria"]; ?>" alt="Galeria">
                    </div>
                    <h3 class="text-center font-weight-normal pt-3"><?php echo $datos["Titulo"];?></h3>
                    <p class="text-center"><?php echo $datos["FechaCargado"];?></p>
                    <form class="text-center" action="../Administracion/Eliminar_Gale.php" method="post">
                        <button style="background: linear-gradient(to bottom, #ff0000,#881919); 
                        color: black;
                        padding:5px 8px;
                        margin: 2px;
                        border: 1px solid transparent;
                        border-radius: 2%;" 
                        class="btn-compra Admin_BTN">Eliminar</button>
                        <input type="hidden" name="idGaleria" value="<?php echo $datos['idGaleria']; ?>">
                    </form>
                </div>
            <?php 
                        }
                    }
            ?>
        </div>
        <div class="col-lg-12 col-md-12 col-12 pb-3">
            <div class="Fotos-img">
                <img style="border-radius: 2%;" class="img-fluid w-100" src="../img/Slide2_Pc.png" alt="Noticias">
            </div>
        </div>
</section>
<?php
    }
?>

<!-- Carrito de Compras  -->
<?php
    function Carrito_comp(){
?>  
    <!-- Seccion de carrito de Compras -->
    <section id="News-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Carrito de Compras</h2><hr>
    </section>
    <!-- Seccion de productos en el carrito de compras -->
    <section id="carro-Container" class="container my-5">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remover</td>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(!isset($_SESSION['idU'])){
                    header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                }
                // En esta parte realizamos la verificacion del usuario que esta agregando los productos al carrito
                $c = mysqli_connect("localhost","root","","proyecto-final");
                // $Rul = "select Rol from  where idUsuario=". $_SESSION['idU'];
                // $rs0 = mysqli_query($c,$Rul);
                // $RolUsr = mysqli_fetch_array($rs0);
                //     if($RolUsr["Rol"] != "General"){
                //         header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                //     }
                $Ptotal = 0;
                $PEtotal = 0;
                $qry ="SELECT * FROM carrito WHERE idUsuario=".$_SESSION["idU"];
                $rs = mysqli_query($c, $qry);
                if(mysqli_num_rows($rs)>0){
                    while($carrito = mysqli_fetch_array($rs)){
                        $qry2 ="SELECT * FROM productos WHERE idProducto=".$carrito['idProducto'];
                        $rs2 = mysqli_query($c, $qry2);
                        $cosas = mysqli_fetch_array($rs2);
            ?>
                <tr>
                    <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                    <td> <img src="../Administracion/Imagen.php?idImg=<?php echo $cosas["idProducto"]; ?>" alt=""></td>
                    <td> <h5><?php echo $cosas["Titulo"];?></h5></td>
                    <td> <h5><?php echo $cosas["Precio"];?></h5></td>
                    <td> <h5><?php echo $carrito["Cantidad"];?></h5></td>
                    <td><h5><?php echo $carrito["Total"];?></h5></td>
                </tr>
            <?php
                $Ptotal += $carrito["Total"];
                $PEtotal = $Ptotal + 250;
                    }   
                }
            ?>
            </tbody>
        </table>
    </section>
    <!-- seccion de cobro/total a pagar -->
    <section id="carro-cobro" class="container">
        <div class="row">
            <div class="cupon col-lg-6 col-md-6 col-12 mb-4">
                <!-- <div>
                    <h5>CUPON</h5>
                    <p>Ingresa en esta seccion el cupon de descuento.</p>
                    <input type="text" placeholder="Ingresa el Codigo">
                    <button>Aplicar</button>
                </div> -->
            </div>
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>TOTAL</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <p>$<?php echo $Ptotal?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Envio de Productos</h6>
                        <p>$250.00</p>
                    </div>
                    <hr class="segundo-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p>$<?php echo $PEtotal?></p>
                    </div>

                    <?php 
                        if(!isset($_SESSION['idU'])){
                            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                        }
                        // En esta parte realizamos la verificacion del usuario que esta agregando los productos al carrito
                        $c = mysqli_connect("localhost","root","","proyecto-final");
                        // $Rul = "select Rol from  where idUsuario=". $_SESSION['idU'];
                        // $rs0 = mysqli_query($c,$Rul);
                        // $RolUsr = mysqli_fetch_array($rs0);
                        //     if($RolUsr["Rol"] != "General"){
                        //         header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                        //     }
                        $Ptotal = 0;
                        $PEtotal = 0;
                        $CantidadT =0;
                        $qry ="SELECT * FROM carrito WHERE idUsuario=".$_SESSION["idU"];
                        $rs = mysqli_query($c, $qry);
                        if(mysqli_num_rows($rs)>0){
                            while($carrito = mysqli_fetch_array($rs)){
                                $qry2 ="SELECT * FROM productos WHERE idProducto=".$carrito['idProducto'];
                                $rs2 = mysqli_query($c, $qry2);
                                $cosas = mysqli_fetch_array($rs2);
                                $Ptotal += $carrito["Total"];
                                $PEtotal = $Ptotal + 250;
                                $CantidadT += $carrito["Cantidad"];
                            }
                    ?>

                    <form action="../Administracion/AgregaCompra.php" method="post">
                        <!-- crear inputs invisibles para enviar la informacion necesaria -->
                        <input type="hidden" name="Precio" value="<?php echo $PEtotal; ?>">
                        <input type="hidden" name="CantidadPT" value="<?php echo $CantidadT; ?>">
                        <button style="margin: 0 12px 20px 0; display: flex; justify-content: flex-end;" 
                        class="ml-auto">Confirmar Compra</button>
                    </form>
                    <?php
                        }
                    ?>
                    </div>
            </div>
        </div>
    </section>
<?php
    }
?>
<!-- Compras ya echas por el usuario -->
<?php 
    function Compras_Realizadas(){
?>
<!-- Seccion de Compras ya realizadas por el usuario -->
<section id="News-Home" class="pt-5 mt-5 container">
        <h2 class="font-weight-bold pt-5">Compras Realizadas</h2><hr>

    </section>
    <section id="carro-Container" class="container my-5">
        <table width="100%">
            <thead>
                <tr>
                    <td>Clave</td>
                    <td>Fecha</td>
                    <td>Total</td>
                    <td>Metodo</td>
                    <td>Productos Comprados</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_SESSION['idU'])){
                        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
                    }
                    // En esta parte realizamos la verificacion del usuario que esta agregando los productos al carrito
                    $c = mysqli_connect("localhost","root","","proyecto-final");
                    $claveC =0;
                    $qry ="SELECT * FROM compras WHERE idUsuario=".$_SESSION["idU"];
                    $rs = mysqli_query($c, $qry);
                    if(mysqli_num_rows($rs)>0){
                        while($compra =mysqli_fetch_array($rs)){
                            $claveC += $compra["Clave"];
                ?>
                <tr>
                    <td><?php echo $claveC; ?></td>
                    <td><?php echo $compra["Dia"]; ?></td>
                    <td><h6><?php echo $compra["Total"]; ?></h6></td>
                    <td><h6><?php echo $compra["MetodoCompra"]; ?></h6></td>
                    <td><h5><?php echo $compra["CantProductos"]; ?></h5></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    }
?>  
<!-- --------------------------------------------------------- -->
<!-- Funcion para logearse en la pagina -->
<?php
    function LogIn(){
?>
    <!-- Informacion mandada del servidor (Errores o aceptacion) -->
    <?php
        //Se recupera la bandera para mostrar el msg
        $msg =""; //Mensaje vacio
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] =="1") $msg ="El Usuario/Contraseña son Incorrectos.";
        }
    ?>
    <!-- Verificacion en pagina de que haya valores -->
    <script type="text/javascript">
        function validarFRM(){
            // Validamos quie no se encuentren vacias las casillas
            if(document.getElementById("txtUsuario").value =="" ||
            document.getElementById("txtPwd").value =="") 
            {
                alert("Debes de llenar todos los campos para continuar");
                return false;
            }
        return true;
        }
    </script>
    <!-- Contenido del Login -->
    <div class="CuerpoLog">
        <div class="container w-80 mt-5 rounded shadow">
            <div class="row align-items-stretch">
                <div class="col imgLog d-none d-lg-block col-md-5 col-lg-6 col-xl-6 rounded">
                </div>
                <div class="col bg-white p-5 rounded-end">
                    <div class="text-end">
                        <img src="../img/Logotipo_1.png" width="130" alt="Logotipo">
                    </div>
                    <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                    <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?> </div>
                <!-- Login de la pagina -->
                <Form method="post" action="logeaUsuario.php" onsubmit="return validarFRM()">
                    <div class="mb-4">
                        <label for="text" class="form-lable">Usuario</label>
                        <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-lable">Contraseña</label>
                        <input type="text" class="form-control" id="txtPwd" name="txtPwd" placeholder="Contraseña">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        <!-- <input type="submit" value="Autenticame"> -->
                    </div>
                    <div class="my-3">
                        <span>Regresar a la <a href="PaginaPrincipal.php">Pagina Principal</a></span><br>
                        <span>¿No tienes cuenta?<a href="../PaginaPrincipal/Registro.php">Regístrate</a></span> ||
                        <span><a href="../PaginaPrincipal/RecuperaPwd.php">Recuperar Contraseña</a></span>
                    </div>
                </Form>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
<!-- Recuperacion de la contraseña de usuarios ya autenticados -->
<?php
    function RecuperarContra(){
?>
    <!-- Informacion mandada del servidor (Errores o aceptacion) -->
    <?php
        //Se recupera la bandera para mostrar el msg
        $msg =""; //Mensaje vacio
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] =="1") $msg ="Se debe de utilizar el formulario de registro";
            if($_GET['err'] =="2") $msg ="Todos los datos son requeridos";
            if($_GET['err'] =="3") $msg ="Las contraseñas no coinciden";
            if($_GET['err'] =="4") $msg ="Se ha cambiado la contraseña Correctamente";
        }
    ?>
    <!-- Verificacion por java de los datos que se mandan -->
    <script type="text/javascript">
        function validarFRM(){
            // Validamos quie no se encuentren vacias las casillas
            if(document.getElementById("txtUsuario").value =="" || 
            document.getElementById("txtEmail").value =="" ||
            document.getElementById("txtPwd").value =="" ||
            document.getElementById("txtRePwd").value =="") 
            {
                alert("Debes de llenar todos los campos marcados con *");
                return false;
            }else if(document.getElementById("txtCheck").value ==""){ //Verificamos la casilla de terminos y condiciones
                alert("Debes de aceptar los terminos y condiciones");
                return false;
            }else if(document.getElementById("txtPwd").value != document.getElementById("txtRePwd").value){ //verificamos que concidan las contraseñas
                document.getElementById("txtMsg").innerHTML = "Las contraseñas deben de ser iguales ";
                document.getElementById("txtPwd").value= "";
                document.getElementById("txtRePwd").value= "";
                return false;
            }
        }
    </script>
    <!-- Contenido del Registro -->
    <div class="Cuerpo-Reg">
        <section class="contact-box">
            <div class="row no-gutters bg-dark">
                <div class="col-xl-5 col-gl-12 register-bg">
                </div>
                <div class="col-xl-7 col-lg-12 d-flex">
                    <div class="container align-self-center p-6">
                        <h1 class="font-weight-bold">Recupera tu Contraseña</h1>
                        <div class="form-group">
                            <!-- <button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3"></button>
                            <button class="btn btn-outlline-dark d-inline-block text-light mb-3"></button> -->
                            <p class="text-muted mb-5">Ingresa la información para Recuperar la Contraseña</p>
                            <!-- Alertas que se mandan de el servidor -->
                            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?> </div>

                            <form method="post" action="RecuperarContraseña.php" onsubmit="return validarFRM()"> <!-- Formato para ingresar los datos -->
                                <!-- Ingreso de los datos para el registro -->
                                <div class="form-group mb-3"> <!-- Ingreso del nombre -->
                                    <label class="front-weight-bold">Tu Usuario <span class="text-danger">*</span></label>
                                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control inp" placeholder="Tu Nombre"> 
                                </div>
                                <div class="form-group mb-3"><!-- Ingreso del Correo Electronico -->
                                    <label class="front-weight-bold">Tu Correo Electronico <span class="text-danger">*</span></label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control inp" placeholder="TuCorreo@correo.com"> 
                                </div>
                                <div class="form-group mb-3"><!-- Ingreso del Contraseña -->
                                    <label class="front-weight-bold"> Contraseña Nueva<span class="text-danger">*</span></label>
                                    <input type="password" id="txtPwd" name="txtPwd" class="form-control inp" placeholder="Tu Contraseña"> 
                                </div>
                                <div class="form-group md-3"><!-- Ingreso del Confirmacion de la contraseña -->
                                    <label class="front-weight-bold">Repetir Contraseña<span class="text-danger">*</span></label>
                                    <input type="password" id="txtRePwd" name="txtRePwd" class="form-control inp" placeholder="Tu Contraseña"> 
                                </div>
                                <!-- Check box de terminos y condiciones -->
                                <button class="btn btn-primary width-100" type="submit">Cambiar</button>
                                <button class=" btn_izq btn btn-primary width-100" type="reset">Cancelar</button>
                                <a class="btn btn-primary width-100 btn-Reg" href="PaginaPrincipal.php">Pagina Principal</a>
                                <!-- <button class="btn btn-primary"><input class="btn btn-primary width-100 btn-Reg" type="submit" value="Regístrarme"></button>
                                <button class="btn btn-primary"><a class="btn btn-primary width-100 btn-Reg" href="Login.php">Iniciar Sesión</a></button> -->
                            </form>

                            <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © 2021 PC X.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    }
?>

<!-- Funcion de Registro de Usuario -->
<?php
    function Registro(){
?>
    <!-- Informacion mandada del servidor (Errores o aceptacion) -->
    <?php
        //Se recupera la bandera para mostrar el msg
        $msg =""; //Mensaje vacio
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] =="1") $msg ="Se debe de utilizar el formulario de registro";
            if($_GET['err'] =="2") $msg ="Todos los datos son requeridos";
            if($_GET['err'] =="3") $msg ="Las contraseñas no coinciden";
            if($_GET['err'] =="4") $msg ="El usuario se registro correctamente";
        }
    ?>
    <!-- Verificacion por java de los datos que se mandan -->
    <script type="text/javascript">
        function validarFRM(){
            // Validamos quie no se encuentren vacias las casillas
            if(document.getElementById("txtUsuario").value =="" || 
            document.getElementById("txtEmail").value =="" ||
            document.getElementById("txtPwd").value =="" ||
            document.getElementById("txtRePwd").value =="") 
            {
                alert("Debes de llenar todos los campos marcados con *");
                return false;
            }else if(document.getElementById("txtCheck").value ==""){ //Verificamos la casilla de terminos y condiciones
                alert("Debes de aceptar los terminos y condiciones");
                return false;
            }else if(document.getElementById("txtPwd").value != document.getElementById("txtRePwd").value){ //verificamos que concidan las contraseñas
                document.getElementById("txtMsg").innerHTML = "Las contraseñas deben de ser iguales ";
                document.getElementById("txtPwd").value= "";
                document.getElementById("txtRePwd").value= "";
                return false;
            }
        }
    </script>
    <!-- Contenido del Registro -->
    <div class="Cuerpo-Reg">
        <section class="contact-box">
            <div class="row no-gutters bg-dark">
                <div class="col-xl-5 col-gl-12 register-bg">
                </div>
                <div class="col-xl-7 col-lg-12 d-flex">
                    <div class="container align-self-center p-6">
                        <h1 class="font-weight-bold">Regístrate Gratuitamente</h1>
                        <div class="form-group">
                            <!-- <button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3"></button>
                            <button class="btn btn-outlline-dark d-inline-block text-light mb-3"></button> -->
                            <p class="text-muted mb-5">Ingresa la información para Registrarte</p>
                            <!-- Alertas que se mandan de el servidor -->
                            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?> </div>
                            <form method="get" action="registraUsuario.php" onsubmit="return validarFRM()"> <!-- Formato para ingresar los datos -->
                                <!-- Ingreso de los datos para el registro -->
                                <div class="form-group mb-3"> <!-- Ingreso del nombre -->
                                    <label class="front-weight-bold">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control inp" placeholder="Tu Nombre"> 
                                </div>
                                <div class="form-group mb-3"><!-- Ingreso del Correo Electronico -->
                                    <label class="front-weight-bold">Correo Electronico <span class="text-danger">*</span></label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control inp" placeholder="TuCorreo@correo.com"> 
                                </div>
                                <div class="form-group mb-3"><!-- Ingreso del Contraseña -->
                                    <label class="front-weight-bold">Contraseña <span class="text-danger">*</span></label>
                                    <input type="password" id="txtPwd" name="txtPwd" class="form-control inp" placeholder="Tu Contraseña"> 
                                </div>
                                <div class="form-group md-3"><!-- Ingreso del Confirmacion de la contraseña -->
                                    <label class="front-weight-bold">Confirmar Contraseña <span class="text-danger">*</span></label>
                                    <input type="password" id="txtRePwd" name="txtRePwd" class="form-control inp" placeholder="Tu Contraseña"> 
                                </div>
                                <!-- Check box de terminos y condiciones -->
                                <div class="form-group mb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" id="txtCheck" type="checkbox">
                                        <label class="form-check-label text-muted">Al seleccionar esta casilla acepta nuestros términos 
                                        de privacidad, los términos y condiciones.</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary width-100" type="submit">Registrarte</button>
                                <button class=" btn_izq btn btn-primary width-100" type="reset">Cancelar</button>
                                <a class="btn btn-primary width-100 btn-Reg" href="PaginaPrincipal.php">Pagina Principal</a>
                                <!-- <button class="btn btn-primary"><input class="btn btn-primary width-100 btn-Reg" type="submit" value="Regístrarme"></button>
                                <button class="btn btn-primary"><a class="btn btn-primary width-100 btn-Reg" href="Login.php">Iniciar Sesión</a></button> -->
                            </form>
                            <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © 2021 PC X.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    }
?>
<!-- Cambio de Contraseña del usuario autenticado -->
<?php
    function CambioContra(){
?>
<!-- Creamos la variable mensaje para poder resivir el valor de el servidor -->
    <?php
        $msg ="";
        if(isset($_GET['res']) && $_GET['res']!=""){
            if($_GET['res'] =="1") $msg ="Se cambio la Contraseña Correctamente";
            if($_GET['res'] =="2") $msg ="Ocurrio un problema, no se Actualizo";
        }
    ?>
    <style type="text/css">
        form .entrada{
            margin: 3px 0;
            padding: 3px 6px;
        }
        form .boton{
            margin: 3px 0;
            padding: 2px 6px;
        }
        form .alerta{
            color: red;
        }
        form .Sep{
            padding: 3px 0;
            margin: 3px 0 0 3px;
        }
    </style>

    <script type="text/javascript">
        function validarFRM(){
            //Validar que los campos no esten vacios
            if(document.getElementById("txtPwdActual").value=="" || 
            document.getElementById("txtNewPwd").value=="" ||
            document.getElementById("txtReNewPwd").value==""){
                alert("Se deben de llenar todos los Espacios");
                return false;
            //Verificamos que las nuevas contraseñas sean iguales
            }else if(document.getElementById("txtNewPwd").value != document.getElementById("txtReNewPwd").value){
                document.getElementById("txtMsg").innerHTML = "Las contraseñas Nuevas no conciden.";
                document.getElementById("txtNewPwd").value= "";
                document.getElementById("txtReNewPwd").value= "";
                return false;
            }
        return true;
        }
    </script>

    <div class="container mt-5 py-5">
            <h3 class="pt-5">Cambio de Contraseña</h3>
            <hr>
    <div class="conteiner">
        <!-- Seccion provicional para deslogear -->
        <form method="post" action="../PaginaPrincipal/CambioPwd.php" onsubmit="return validarFRM()">
            <h4>Ingresa los datos que se piden para cambiar la contraseña</h4>
            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?></div><br>
            Contraseña Actual:<input type="text" class="Sep" id="txtPwdActual" name="txtPwdActual" placeholder="Contraseña Actual"><br>
            Contraseña Nueva: <input type="text" class="Sep" id="txtNewPwd" name="txtNewPwd" placeholder="Contraseña Nueva"><br>
            Repetir Contraseña Nueva:<input type="text" class="Sep" id="txtReNewPwd" name="txtReNewPwd" placeholder="Repetir Conraseña"><br>
            <div class="row col-lg-5 col-lg-3 col-md-4 col-12">
            <input class="boton" type="submit" value="Cambiar Contraseña">
            <input class="boton" type="reset" value="Cancelar">
            </div>
            Regresar a <a href="Setings.php">Opciones</a>.
        </form>
    </div>

<?php
    }
?>
<!-- Cambio de Email del usuario autenticado -->
<?php
    function CambioEmail(){
?>
<!-- Creamos la variable mensaje para poder resivir el valor de el servidor -->
    <?php
        $msg ="";
        if(isset($_GET['res']) && $_GET['res']!=""){
            if($_GET['res'] =="1") $msg ="Se cambio el correo Correctamente";
            if($_GET['res'] =="2") $msg ="Ocurrio un problema, no se Actualizo";
        }
    ?>
    <style type="text/css">
        form .entrada{
            margin: 3px 0;
            padding: 3px 6px;
        }
        form .boton{
            margin: 3px 0;
            padding: 2px 6px;
        }
        form .alerta{
            color: red;
        }
        form .Sep{
            padding: 3px 0;
            margin: 3px 0 0 3px;
        }
    </style>

    <script type="text/javascript">
        function validarFRM(){
            //Validar que los campos no esten vacios
            if(document.getElementById("txtPwdActual").value=="" || 
            document.getElementById("txtNewPwd").value=="" ||
            document.getElementById("txtReNewPwd").value==""){
                alert("Se deben de llenar todos los Espacios");
                return false;
            //Verificamos que las nuevas contraseñas sean iguales
            }else if(document.getElementById("txtNewPwd").value != document.getElementById("txtReNewPwd").value){
                document.getElementById("txtMsg").innerHTML = "El correo nuevo no concide en la verificacion";
                document.getElementById("txtNewPwd").value= "";
                document.getElementById("txtReNewPwd").value= "";
                return false;
            }
        return true;
        }
    </script>

    <div class="container mt-5 py-5">
            <h3 class="pt-5">Cambio de Correo Electronico</h3>
            <hr>
    <div class="conteiner">
        <!-- Seccion provicional para deslogear -->
        <form method="post" action="../PaginaPrincipal/CambioEm.php" onsubmit="return validarFRM()">
            <h4>Ingresa los datos que se piden para cambiar el Correo</h4>
            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?></div><br>
            Correo Actual:<input type="text" class="Sep" id="txtEmailAc" name="txtEmailAc" placeholder="Correo Actual"><br>
            correo Nueva: <input type="text" class="Sep" id="txtNewEmail" name="txtNewEmail" placeholder="Correo Nueva"><br>
            Repetir Correo Nueva:<input type="text" class="Sep" id="txtReNewEmail" name="txtReNewEmail" placeholder="Repetir Correo"><br>
            <div class="row col-lg-5 col-lg-3 col-md-4 col-12">
            <input class="boton" type="submit" value="Cambiar Correo">
            <input class="boton" type="reset" value="Cancelar">
            </div>
            Regresar a <a href="Setings.php">Opciones</a>.
        </form>
    </div>

<?php
    }
?>

<!-- Opciones para el Usuario autenticado -->
<?php
    function opciones(){
?>
    <!-- Seccion provicional para deslogear -->
    <div class="container mt-5 py-5">
            <h3>Opciones de usuario</h3>
            <hr>
            <!-- <p>Servicios hechos por gente profesional</p> -->
    </div>
    <section>
        <div class="container">
            <a href="Logout.php">Salir de la pagina</a><br>
            <a href="ComprasRealizadas.php">Tus Compras</a><br>
            <a href="PedirCambioPwd.php">Cambio de contraseña</a><br>
            <a href="PedirCambioEm.php">Cambio de Correo Electronico</a><br>
        </div>
    </section>
<?php
    }
?>

<!-- Opciones para Administrador -->
<?php
    function opciones_admin(){
?>
    <!-- Seccion provicional para deslogear -->
    <div class="container mt-5 py-5">
            <h3>Opciones de usuario</h3>
            <hr>
            <!-- <p>Servicios hechos por gente profesional</p> -->
    </div>
    <section>
        <div class="container">
            <a href="Logout.php">Salir de la pagina</a><br>
            <a href="Admi_Carga.php">Subir un Producto / Servicio.</a><br>
            <a href="Admi_Carga_News.php">Subir una Noticia.</a><br>
            <a href="Admi_Carga_Foto.php">Subir una foto a la Galeria.</a><br>
        </div>
    </section>
<?php
    }
?>
