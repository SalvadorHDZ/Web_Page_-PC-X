<?php
    session_start();
    include("../Funciones_Comunes.php");
    $msg="";
    if(!isset($_SESSION['idU'])){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
    }
    if(isset($_POST['txtPwdActual']) && isset($_POST['txtNewPwd']) && isset($_POST['txtReNewPwd']))
    {
        if(isset($_POST['txtPwdActual'])!="" && isset($_POST['txtNewPwd'])!="" && isset($_POST['txtReNewPwd'])!=""){
            $c = conectarBD();
            $consulta = "UPDATE usuarios SET Pwd= '".$_POST['txtNewPwd']."' 
            WHERE idUsuario=".$_SESSION['idU']." AND Pwd='".$_POST["txtPwdActual"]."'";
            mysqli_query($c,$consulta);
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PedirCambioPwd.php?res=1");
        }else{
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PedirCambioPwd.php?res=2");
        }
    }
    mysqli_close($c);
?>