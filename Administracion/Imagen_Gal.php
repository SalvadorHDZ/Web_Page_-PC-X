<?php
    if(isset($_GET["idImgG"]) && $_GET["idImgG"]!=""){
        $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
        $qry = "SELECT Extension, Contenido FROM galeria WHERE idGaleria=".$_GET["idImgG"];
        
        $rs = mysqli_query($c, $qry);
        $ima = mysqli_fetch_array($rs);
        header("Content-type:".$ima["Extension"]);
        echo $ima["Contenido"];
        mysqli_close($c);
    }
?>