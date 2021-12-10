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
            Pag_Principal();
            footer_Autenticado();
            
        }else{ //Pagina para los usuarios Administradores
            NavBar_Administrador();
            Pag_Principal();
            footer_Autenticado();
        }
    }else{
        NavBar_NoAutenticado();
        Pag_Principal();
        footer_NoAutenticado();
    }
?>

<?php
    include("../template/Pie-Pagina.php");
?>