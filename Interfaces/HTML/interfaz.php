<?php
    session_start();

    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }
    $correo=$_SESSION['correo'];

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8"); 

    if(isset($_POST['añadir_carrito'])){
        $nombre_producto= $_POST['nombre_producto'];
        $precio_producto= $_POST['precio_producto'];
        $imagen_producto= $_POST['imagen_producto'];
        $codigo_producto= $_POST['codigo_producto'];
        $correo_vendedor= $_POST['correo_vendedor'];
        $cantidad_producto= "";

        $sql= mysqli_query($conexion, "SELECT * FROM carrito WHERE cod_producto= '$codigo_producto' /* AND nombre_producto= '$nombre_producto' */");
        
        if(mysqli_num_rows($sql) > 0){
            $message[] = 'Ya esta en el carrito';
        }else{
            $insert_productos= mysqli_query($conexion, "INSERT INTO `carrito`(correo_electronico, correo_Vendedor, cod_producto, foto, nombre_producto, precio_p, cantidad_producto) VALUES ('$correo', '$correo_vendedor', '$codigo_producto', '$imagen_producto', '$nombre_producto', '$precio_producto', '$cantidad_producto')");
            $message[] = 'Añadidio al carrito';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/interfaz.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Interfaz</title>
</head>
    
<body>

    <?php include '../HEADER-FOOTER/header.php';?>
        
    <main class="main">
        <div class="container">
            <div class="container-slider">
                <section class="slider-productos" id="slider">
                    <?php include '../SELECTS-PHP/select-productos-usuario.php'?>
                </section>

                <div class="slider__btn btn_atras" id="botonAtras">&#60;</div>
                <div class="slider__btn btn_siguiente" id="botonAdelante">&#62;</div>
            </div>

            <section class="container-productos2">
                <div class="producto2">
                    <img src="../Imagenes/Composta.png" alt="" class="producto_img2"></img>
                    <h3 class="producto_title2"><a href="../HTML Productos/Composta.php">Composta</a></h3>
                </div>

                <div class="producto2">
                    <img src="../Imagenes/Ferilizante.jpeg" alt="" class="producto_img2">
                    <h3 class="producto_title2"><a href="../HTML Productos/Fertilizantes.php">Fertilizantes</a></h3>
                </div>

                <div class="producto2">
                    <img src="../Imagenes/Frutas.jpg" alt="" class="producto_img2">
                    <h3 class="producto_title2"><a href="../HTML Productos/Frutas.php">Frutas</a></h3>
                </div>

                <div class="producto2">
                    <img src="../Imagenes/Verduras.jpg" alt="" class="producto_img2">
                    <h3 class="producto_title2"><a href="../HTML Productos/Verduras.php">Verduras</a></h3>
                </div>

                <div class="producto2">
                    <img src="../Imagenes/Campo_u.jpg" alt="" class="producto_img2">
                    <h3 class="producto_title2"><a href="../HTML Productos/Utls_campo.php">Utencilios del campo</a></h3>
                </div>
            </section>
        </div>
    </main>

    <div class="icono_msj">
        <a href=""><i class="fa-solid fa-messages"></i></a>
    </div>

    <?php include '../HEADER-FOOTER/footer.php';?>

    <script>
        function abrir_menu(){
            document.getElementById('coso').style.visibility="visible";
            document.getElementById('coso').style.opacity="1";
        }

        function cerrar_menu(){
            document.getElementById('coso').style.visibility="hidden";
            document.getElementById('coso').style.opacity="0";
        }
    </script>

    <!--<script type="text/javascript">
            $(document).ready(function(){
                $('#btn_foto').click(function(){
                    var datos=new FormData($('#Foto_perfil')[0]);

                    $('#mensaje').html();

                    $.ajax({
                        url:'../PHP_conectar/foto_usuario.php',
                        type:'POST',
                        data: datos,
                        contentType:false,
                        processData:false,
                        success: function(datos){
                            $('#mensaje').html(datos)
                            alert("Guardado con exito");
                        }
                    });

                    return false;
                });
            });
        </script> -->

    <script src="../Scripts/slider.js"></script>
    <script src="previsualizar.js"></script>
    <script src="../Script/NS.js"></script>
</body> 
</html>