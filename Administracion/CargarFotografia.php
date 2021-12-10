<?php
    session_start();
    // include("../Funciones_Comunes.php");
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
    if(isset($_POST["txtTitulo"])){
        if(!empty($_FILES["archivo"]["tmp_name"])){

            //Rescatamos la informacion del archivo.
            $nombre = $_FILES["archivo"]["name"];
            $extencion = $_FILES["archivo"]["type"];
            $nombre_temporal = $_FILES["archivo"]["tmp_name"];
            $tamanio = $_FILES["archivo"]["size"];

            $titulo = $_POST["txtTitulo"];

            //Tenemos que recuperar el contenido del archivo.
            $fp = fopen($nombre_temporal,"r");
            $contenido = fread($fp,$tamanio);
            fclose($fp);

            //Transformar los caracteres especiales
            $contenido = addslashes($contenido);
            $Fecha=date("d/m/Y");

            //Insertamos el archivo en la BD
            $qry = "INSERT into galeria (Titulo, FechaCargado, idUsuario, Tipo, Extension, NombreOriginal, Contenido) VALUES
                                        ('$titulo','$Fecha',". $_SESSION["idU"].",'Galeria','$extencion','$nombre','$contenido')";
            mysqli_query($c,$qry);
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Admi_Carga_Foto.php?vari=1");
        }
    }
?>