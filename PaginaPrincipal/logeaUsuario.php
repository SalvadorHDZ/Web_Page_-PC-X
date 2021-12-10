<?php
session_start();
include("../Funciones_Comunes.php");
$msg ="";
    if(isset($_POST['txtUsuario']) && isset($_POST['txtPwd'])){
        if($_POST['txtUsuario']!="" && $_POST['txtPwd']!=""){
            //conectar a la BD para verificar que el USR y PWD sean correctos
            $c = conectarBD();
            //Generamos la consulta
            $qry = "select * from usuarios where Usuario='". $_POST['txtUsuario'] ."' and Pwd='" . $_POST['txtPwd'] . "'";
            $rs = mysqli_query($c, $qry); //Obtenemos el resultado de la busqueda de el usuario.
            if(mysqli_num_rows($rs)>0){//El usuario si se autentico correctamente.
                $datosUsuario = mysqli_fetch_array($rs);
                //hacer el redireccionamiento por GET expone toda la informacion del usuario
                //header("location:http://localhost/Ejercicios_de-Clase-PHP/Clase-7/portada.php?idU=".$datosUsuario['idUsuario'].");
                
                //Es mejor establecer la sesion en el Servidor
                //$_SESSION['']
                $_SESSION['idU'] = $datosUsuario["idUsuario"];
                $_SESSION['nombre'] = $datosUsuario["Usuario"];
                header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
            }else{
                // $msg ="El usuario / contraseña no son correctos";
                // Realizar un header a la pagina de login con un error que le muestre al usuario que se equivoco en el usuario
                // o la contraseña
                header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Login.php?err=1");
            }
            mysqli_close($c);
        }
    }
?>

<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    Estilos de Css
    <link rel="stylesheet" href="Estilos.css">
    <title>Login Usuario</title>
</head>
<body>
    <?php 
        if($msg !="") echo $msg;
    ?> 
</body>
</html> -->