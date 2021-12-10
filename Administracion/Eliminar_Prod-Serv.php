<?php
    session_start();
    // verificamos que exista un usuario
    if(!isset($_SESSION['idU'])){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
    }
    // $c = conectarBD();
    $c = mysqli_connect("localhost","root","","proyecto-final");
    $Rul = "select Rol from  where idUsuario=". $_SESSION['idU'];
    $rs = mysqli_query($c,$Rul);
    $RolUsr = mysqli_fetch_array($rs);
        if($RolUsr["Rol"] != "Admin"){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
        }
    if(isset($_POST["idProducto"]) && $_POST["idProducto"]!=""){
        $qry ="DELETE FROM productos WHERE idProducto=".$_POST["idProducto"];
        mysqli_query($c,$qry);
    }
    header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Productos.php");
?>