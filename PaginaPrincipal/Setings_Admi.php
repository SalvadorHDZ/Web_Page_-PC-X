<?php
    include("../template/Encabezado.php");
    include("../Funciones_Comunes.php");
    include("../Funciones.php");
    //Carga la pagina de login
    //Checamos si existe alguna sesion iniciada si no mostramos la pagina de no autenticados
    if(isset($_SESSION['idU'])){ 
        $RolUs= rolUsuario($_SESSION['idU']);//Extraemos al rol del usuario que ingreso a la pagina.
        if( $RolUs == "Admin") //Pagina para usuarios autenticados
        {
            NavBar_Administrador();
            opciones_admin();
            footer_Autenticado();
        }
    }
?>

<?php
    include("../template/Pie-Pagina.php");
?>