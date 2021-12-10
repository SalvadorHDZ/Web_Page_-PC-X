<?php
    session_start();
    function Cargar_Archivo(){
?>
    <!-- Creamos la variable mensaje para poder resivir el valor de el servidor -->
    <?php
        $msg ="";
        if(isset($_GET['vari']) && $_GET['vari']!=""){
            if($_GET['vari'] =="1") $msg ="Se cargo correctamente el Producto";
        }
    ?>
    <style type="text/css">
        form .entrada{
            margin: 3px 0;
            padding: 3px 6px;
        }
        form .boton{
            margin: 3px 0;
            padding: 2px 6px;
        }
        form .alerta{
            color: red;
        }
    </style>
    <script type="text/javascript">
        function validarFRM(){
            // Validamos que los campos del formulario se encuentre llenos con la informacion correcta
            if(document.getElementById("txtTitulo").value =="" ||
            document.getElementById("archivo").value =="" ||
            document.getElementById("precio").value ==""){
                alert("Todos los campos deben de estar llenos");
                return false;
            }else{
                return true;
            }
        }
    </script>
    
    <div class="container mt-5 py-5">
            <h3>Opciones de Administrador</h3>
            <hr>
    <div class="conteiner">
        <!-- Seccion provicional para deslogear -->
        <form method="post" enctype="multipart/form-data" action="../Administracion/CargarArchivo.php" onsubmit="return validarFRM()">
            <h3>Cargar producto / Servicio a la Pagina</h3>
            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?></div>
            Nombre del Producto: <input class="entrada" type="text" id="txtTitulo" name="txtTitulo"><br>
            Precio del producto: <input class="entrada" step="any" type="number" id="precio" name="precio"><br>
            Tipo de Producto: <select name="txtTipo" id="txtTipo">
                <option selected value="Producto">Producto</option>
                <option value="Servicio">Servicio</option>
                            </select><br>
            Seleccione la Foto del Producto: <input class="entrada" type="file" id="archivo" name="archivo"><br>
            <div class="row col-lg-5 col-lg-3 col-md-4 col-12">
            <input class="boton" type="submit" value="Carga Archivo">
            <input class="boton" type="reset" value="Cancelar">
            </div>
            Regresar a <a href="Setings_Admi.php">Opciones</a>.
        </form>
    </div>
<?php
    }
?>

<?php
    function Cargar_Noticia(){
?>
    <!-- Creamos la variable mensaje para poder resivir el valor de el servidor -->
    <?php
        $msg ="";
        if(isset($_GET['vari']) && $_GET['vari']!=""){
            if($_GET['vari'] =="1") $msg ="Se cargo correctamente la Noticia";
        }
    ?>

    <style type="text/css">
        form .entrada{
            margin: 3px 0;
            padding: 3px 6px;
        }
        form .boton{
            margin: 3px 0;
            padding: 2px 6px;
        }
        form .alerta{
            color: red;
        }
    </style>
    <script type="text/javascript">
        function validarFRM(){
            // Validamos que los campos del formulario se encuentre llenos con la informacion correcta
            if(document.getElementById("txtTitulo").value =="" ||
            document.getElementById("archivo").value =="" ||
            document.getElementById("txtFecha").value ==""){
                alert("Todos los campos deben de estar llenos");
                return false;
            }else{
                return true;
            }
        }
    </script>

    <div class="container mt-5 py-5">
            <h3>Opciones de Administrador</h3>
            <hr>
    <div class="conteiner">
        <!-- Seccion provicional para deslogear -->
        <form method="post" enctype="multipart/form-data" action="../Administracion/CargarNoticia.php" onsubmit="return validarFRM()">
            <h3>Cargar Noticia</h3>
            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?></div>
                                <!--<input class="entrada" type="text" id="txtTitulo" name="txtTitulo">-->
            Titulo de la Noticia: <br><textarea class="entrada" name="txtTitulo" id="txtTitulo" cols="70" rows="4"></textarea><br>
            Fecha de la Noticia: <input class="entrada" type="text" id="txtFecha" name="txtFecha"><br>
            Seleccione la Foto de la Noticia: <input class="entrada" type="file" id="archivo" name="archivo"><br>
            <div class="row col-lg-5 col-lg-3 col-md-4 col-12">
            <input class="boton" type="submit" value="Carga Noticia">
            <input class="boton" type="reset" value="Cancelar">
            </div>
            Regresar a <a href="Setings_Admi.php">Opciones</a>.
        </form>
    </div>
<?php
    }
?>

<?php
    function Cargar_FotoG(){
?>

    <!-- Creamos la variable mensaje para poder resivir el valor de el servidor -->
    <?php
        $msg ="";
        if(isset($_GET['vari']) && $_GET['vari']!=""){
            if($_GET['vari'] =="1") $msg ="Se cargo correctamente la Fotografia";
        }
    ?>

    <style type="text/css">
        form .entrada{
            margin: 3px 0;
            padding: 3px 6px;
        }
        form .boton{
            margin: 3px 0;
            padding: 2px 6px;
        }
        form .alerta{
            color: red;
        }
    </style>
    <script type="text/javascript">
        function validarFRM(){
            // Validamos que los campos del formulario se encuentre llenos con la informacion correcta
            if(document.getElementById("txtTitulo").value =="" ||
            document.getElementById("archivo").value =="" ||
            document.getElementById("txtFecha").value ==""){
                alert("Todos los campos deben de estar llenos");
                return false;
            }else{
                return true;
            }
        }
    </script>

    <div class="container mt-5 py-5">
            <h3>Opciones de Administrador</h3>
            <hr>
    <div>
        <!-- Seccion provicional para deslogear -->
        <form class="conteiner" method="post" enctype="multipart/form-data" action="../Administracion/CargarFotografia.php" onsubmit="return validarFRM()">
            <h3>Cargar Fotografia</h3>
            <div class="alerta" id="txtMsg"><?php if($msg!="") echo $msg; ?></div>
                                <!--<input class="entrada" type="text" id="txtTitulo" name="txtTitulo">-->
            Titulo de la Foto: <br><textarea class="entrada" name="txtTitulo" id="txtTitulo" cols="60" rows="2"></textarea><br>
            Seleccione la Fotografia para la galeria: <input class="entrada" type="file" id="archivo" name="archivo"><br>
            <div class="row col-lg-5 col-lg-3 col-md-4 col-12">
            <input class="boton" type="submit" value="Carga Noticia">
            <input class="boton" type="reset" value="Cancelar">
            </div>
            Regresar a <a href="Setings_Admi.php">Opciones</a>.
        </form>
    </div>

<?php
    }
?>