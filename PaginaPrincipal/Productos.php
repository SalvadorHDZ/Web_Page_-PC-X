<?php
    include("../template/Encabezado.php");
    include("../Funciones_Comunes.php");
    include("../Funciones.php");
    // Cargar la pagina de productos
    //Checamos si existe alguna sesion iniciada si no mostramos la pagina de no autenticados
    if(isset($_SESSION['idU'])){ 
        $RolUs= rolUsuario($_SESSION['idU']);//Extraemos al rol del usuario que ingreso a la pagina.
        if( $RolUs == "General") //Pagina para usuarios autenticados
        {
            NavBar_Autenticado();
            Produ_Servi();
            footer_Autenticado();
        }else{ //Pagina para los usuarios administradores
            NavBar_Administrador();
            Produ_Servi_Admi();
            footer_Autenticado();
        }
    }else{
        header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Login.php");
    }
    // header("location:http://localhost/Proyecto-Final/PaginaPrincipal/Login.php");
?>

<?php
    include("../template/Pie-Pagina.php");
?>