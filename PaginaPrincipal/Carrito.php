<?php 
    include("../template/Encabezado.php");
    include("../Funciones_Comunes.php");
    include("../Funciones.php");
    //Checamos si existe alguna sesion iniciada si no mostramos la pagina de no autenticados
    if(isset($_SESSION['idU'])){ 
        $RolUs= rolUsuario($_SESSION['idU']);//Extraemos al rol del usuario que ingreso a la pagina.
        if( $RolUs == "General") //Pagina para usuarios autenticados
        {
            NavBar_Autenticado();
            Carrito_comp();
            footer_Autenticado();
        }else{ //Pagina para los usuarios administradores
            NavBar_Administrador();
            Carrito_comp();
            footer_Autenticado();
        }
    }
?>

<?php
    include("../template/Pie-Pagina.php");
?>