<?php
    session_start();
    include("../Funciones_Comunes.php");
    $msg="";
    if(!isset($_SESSION['idU'])){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
    }
    if(isset($_POST['txtEmailAc']) && isset($_POST['txtNewEmail']) && isset($_POST['txtReNewEmail']))
    {
        if(isset($_POST['txtEmailAc'])!="" && isset($_POST['txtNewEmail'])!="" && isset($_POST['txtReNewEmail'])!=""){
            $c = conectarBD();
            $consulta = "UPDATE usuarios SET Email= '".$_POST['txtNewEmail']."' 
            WHERE idUsuario=".$_SESSION['idU']." AND Email='".$_POST["txtEmailAc"]."'";
            mysqli_query($c,$consulta);
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PedirCambioPwd.php?res=1");
        }else{
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PedirCambioPwd.php?res=2");
        }
    }
    mysqli_close($c);
?>