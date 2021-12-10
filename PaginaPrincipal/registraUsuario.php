<?php
    //Validamos que los datos se hayan pasado
    if(!isset($_GET['txtUsuario']) ||
        !isset($_GET['txtPwd']) || 
        !isset($_GET['txtRePwd']) ||
        !isset($_GET['txtEmail'])){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Registro.php?err=1");
    }
    // Validamos que los datos no se encuentren vacios
    if($_GET['txtUsuario'] == "" ||
        $_GET['txtPwd'] == "" ||
        $_GET['txtRePwd'] == "" ||
        $_GET['txtEmail'] == ""){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Registro.php?err=2");   
    }
    // Validamos que  tanto la contraseña como su confirmacion sean iguales
    if($_GET['txtPwd'] != $_GET['txtRePwd']){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Registro.php?err=3");
    }

    //Una ves validado recopilamos los datos que se pasaron
    //$usuario = $_Get['txtUsuario'];
    //$Contraseña = $_Get['txtPwd'];
    //$Correo = $_Get['txtEmail'];
    // Extraemos los datos enviados.
    extract($_GET);//Esta funcion hace la extraccion de los valores mandados

    //Realizamos la coneccion con la base de datos
    // Conexion a la BD
    $conn = mysqli_connect("localhost","root","","proyecto-final");

    //Creamos la consulta con la BD
    $consulta ="insert into usuarios (Usuario,Pwd,Rol,Email) value 
                ('$txtUsuario','$txtPwd','General','$txtEmail')";

    $rs = mysqli_query($conn,$consulta);
    header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Registro.php?err=4");
    mysqli_close($conn);
?>