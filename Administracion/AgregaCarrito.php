<?php
    session_start();
    // verificamos que exista un usuario
    if(!isset($_SESSION['idU'])){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
    }
    // En esta parte realizamos la verificacion del usuario que esta agregando los productos al carrito
    $c = mysqli_connect("localhost","root","","proyecto-final");
    $Rul = "SELECT Rol FROM  where idUsuario=". $_SESSION['idU'];
    $rs = mysqli_query($c,$Rul);
    $RolUsr = mysqli_fetch_array($rs);
        if($RolUsr["Rol"] != "General"){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
        }
    // Comenzamos a hacer la insercion del producto al carrito.
    if(isset($_POST["idProducto"]) && $_POST["idProducto"]!="")
    {
        $qry ="SELECT * FROM carrito WHERE idProducto=" . $_POST["idProducto"];
        $rs2 = mysqli_query($c, $qry);
        // verificar que el producto no se encuentre dentro del carrito
        if(mysqli_num_rows($rs2)<=0){ // menor a 0 es que no esta en el carrito
            $qry ="INSERT into carrito (idUsuario,idProducto,Cantidad,Total) VALUES
                            ('".$_SESSION['idU']."','".$_POST["idProducto"]."','1','".$_POST["Precio"]."')";
            mysqli_query($c, $qry);
        }else{
            $cantidad = mysqli_fetch_array($rs2);
            // $qry ="INSERT into carrito (Cantidad) VALUES ('".($cantidad["Cantidad"] + 1)."')";
            $qry = "UPDATE carrito SET Cantidad= '".($cantidad['Cantidad'] + 1)."' where idProducto='".$_POST["idProducto"]."'";
            mysqli_query($c, $qry);
            $qry3 ="UPDATE carrito SET Total='".($cantidad['Total'] + $_POST["Precio"] )."' where idProducto='".$_POST["idProducto"]."'";
            mysqli_query($c, $qry3);
        }
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Productos.php");
        mysqli_close($c);
    }
?>