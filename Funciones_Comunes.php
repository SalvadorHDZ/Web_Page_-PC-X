<?php
    function conectarBD(){
        $conn = mysqli_connect("localhost","root","","proyecto-final");
        return $conn;
    }
    
    function rolUsuario($idUsuario){
        $con = conectarBD();
        $rs = mysqli_query($con,"select Rol from usuarios where idUsuario=".$idUsuario);
        $datoUsr = mysqli_fetch_object($rs);
        return $datoUsr -> Rol;
    }
?>