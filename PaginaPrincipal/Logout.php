<?php
session_start();
session_destroy();
header("location:http://localhost/Proyecto-Final/PaginaPrincipal/PaginaPrincipal.php");
?>