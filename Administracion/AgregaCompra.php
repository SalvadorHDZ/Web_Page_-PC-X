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
        // Empezamos con la insercion en la tabla de productos comprados
        if(isset($_POST["Precio"]) && $_POST["Precio"]!="")
        {
            $fecha = date("d/m/Y");
            $qry ="SELECT * FROM carrito WHERE idUsuario=".$_SESSION["idU"];
                        $rs = mysqli_query($c, $qry);
                        if(mysqli_num_rows($rs)>0){
                            // while($carrito = mysqli_fetch_array($rs)){
                            //     // $qry2 ="SELECT * FROM productos WHERE idProducto=".$carrito['idProducto'];
                            //     // $rs2 = mysqli_query($c, $qry2);
                            //     // $cosas = mysqli_fetch_array($rs2);
                            // }
                        $qry ="INSERT into compras (idUsuario,idProducto,Clave,Dia,MetodoCompra,Total,CantProductos) VALUES
                            ('".$_SESSION['idU']."','".$carrito["idProducto"]."','16432','$fecha','Efectivo','".$_POST["Precio"]."','".$_POST["CantidadPT"]."')";
                        mysqli_query($c, $qry);
                        }
            $qry3 ="DELETE FROM carrito WHERE idUsuario=".$_SESSION["idU"];
            mysqli_query($c,$qry3);
            mysqli_close($c);
            // $qry ="SELECT * FROM carrito WHERE idProducto=" . $_POST["idProducto"];
            // $rs2 = mysqli_query($c, $qry);
            // $fecha = date("d/m/Y");
            // if(mysqli_num_rows($rs2)<=0){
            //     $qry ="INSERT into compras (idUsuario,idProducto,Clave,Dia,MetodoCompra,Total) VALUES
            //     ('".$_SESSION['idU']."','".$_POST["idProducto"]."','16432','$fecha','Efectivo','".$_POST["Precio"]."')";
            //     mysqli_query($c, $qry);
            // }
        }
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/ComprasRealizadas.php");
        mysqli_close($c);
    ?>