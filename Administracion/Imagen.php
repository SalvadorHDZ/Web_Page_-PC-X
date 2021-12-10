<?php
    if(isset($_GET["idImg"]) && $_GET["idImg"]!=""){
        $c = mysqli_connect("localhost","root","","proyecto-final"); //Hacemos la coneccion a la base de datos
        $qry = "SELECT Extension, Contenido FROM productos WHERE idProducto=".$_GET["idImg"];
        
        $rs = mysqli_query($c, $qry);
        $ima = mysqli_fetch_array($rs);
        header("Content-type:".$ima["Extension"]);
        echo $ima["Contenido"];
        mysqli_close($c);
    }
?>