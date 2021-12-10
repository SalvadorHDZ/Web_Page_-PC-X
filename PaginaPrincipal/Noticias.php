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
            Gale_Not();
            footer_Autenticado();
        }else{ //Pagina para los usuarios administradores
            NavBar_Administrador();
            Gale_Not_Admi();
            footer_Autenticado();
        }
    }else{
        NavBar_NoAutenticado();
        Gale_Not();
        footer_NoAutenticado();
    }
?>

<?php
    include("../template/Pie-Pagina.php");
?>