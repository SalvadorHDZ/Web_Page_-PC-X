<?php
    //Validamos que los datos se hayan pasado
    if(!isset($_POST['txtUsuario']) ||
        !isset($_POST['txtPwd']) || 
        !isset($_POST['txtRePwd']) ||
        !isset($_POST['txtEmail'])){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/RecuperaPwd.php?err=1");
    }
    // Validamos que los datos no se encuentren vacios
    if($_POST['txtUsuario'] == "" ||
        $_POST['txtPwd'] == "" ||
        $_POST['txtRePwd'] == "" ||
        $_POST['txtEmail'] == ""){
            header("location:http://localhost/Proyecto-Final/PaginaPrincipal/RecuperaPwd.php?err=2");   
    }
    // Validamos que  tanto la contraseña como su confirmacion sean iguales
    if($_POST['txtPwd'] != $_POST['txtRePwd']){
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/RecuperaPwd.php?err=3");
    }

    //Una ves validado recopilamos los datos que se pasaron
    //$usuario = $_Get['txtUsuario'];
    //$Contraseña = $_Get['txtPwd'];
    //$Correo = $_Get['txtEmail'];
    // Extraemos los datos enviados.
    extract($_POST);//Esta funcion hace la extraccion de los valores mandados

    //Realizamos la coneccion con la base de datos
    // Conexion a la BD
    $conn = mysqli_connect("localhost","root","","proyecto-final");
    //Creamos la consulta con la BD
    if(isset($txtPwd)){
        $qry ="UPDATE usuarios SET Pwd='$txtPwd' WHERE Usuario='$txtUsuario' AND Email='$txtEmail'";
        mysqli_query($conn,$qry);
    }
    header("location:http://localhost/Proyecto-Final/PaginaPrincipal/RecuperaPwd.php?err=4");
    mysqli_close($conn);
    // $consulta ="insert into usuarios (Usuario,Pwd,Rol,Email) value 
    //             ('$txtUsuario','$txtPwd','General','$txtEmail')";
?>