<?php
    session_start();

    
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }
    $correo=$_SESSION['correo'];

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $id= $_GET['id'];
    $sql= "SELECT * FROM producto WHERE cod_producto='$id'";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);

    if(isset($_POST['añadir_carrito'])){
        $nombre_p =$_POST['nombre_p'];
        $precio_p =$_POST['precio_p'];
        $imagen_p =$_POST['imagen_p'];
        $codigo_p= $_GET['id'];
        $cantidad_producto= "";

        $select=mysqli_query($conexion, "SELECT * FROM carrito WHERE cod_producto= '$codigo_p' AND nombre_producto= '$nombre_p'");

        if(mysqli_num_rows($select) > 0){
            $message[] = 'Ya esta en el carrito';
        }else{
            $insert_productos= mysqli_query($conexion, "INSERT INTO `carrito`(correo_electronico, cod_producto, foto, nombre_producto, precio_p, cantidad_producto) VALUES ('$correo', '$codigo_p', '$imagen_p', '$nombre_p', '$precio_p', '$cantidad_producto')");
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
    <title>Compra</title>
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="../CSS/compra.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="../Scripts/jquery-3.2.1.min.js"></script>
</head>
<body>

    <?php include '../HEADER-FOOTER/header.php';?>

    <main class="main">
        <div class="container">
            <section class="producto_container">
                <form class="producto" method="POST">
                    <img src="<?php echo $fila['imagen']?>" alt="" class="producto_img">
                    <h3 class="Nombre_prodcuto"><?php echo $fila['nombre_produto'] ?></h3>
                    <span class="precio"><?php echo $fila['precio_g'] ?></span>
                    <h6 class="descripcion_prodcuto"></h6>
                    <input type="hidden" name="nombre_p" value="<?php echo $fila["nombre_produto"]; ?>">
                    <input type="hidden" name="precio_p" value="<?php echo $fila["precio_g"]; ?>">
                    <input type="hidden" name="imagen_p" value="<?php echo $fila['imagen']; ?>">
                    <input type="hidden" name="codigo_p" value="<?php echo $fila['cod_producto']; ?>">

                    <i class='fa-solid fa-cart-shopping agregar__carro'><input type="submit" class="form_btn" value="Agregar al carrito" name="añadir_carrito"></i>
                    <a href="../mensajeria_Cliente/chat.php?user_id=<?php echo $fila['id_unique']?>" class="form_btn"><i class="fa-regular fa-message fa-bounce"></i> Comunicate con el proveedor</a> 
                </form>
            </section>

            <section class="reseña_producto">
                <div class="Reseña">                    
                    <form action="" class="form_comentarios" id="reseñas" name="reseñas">  
                        <input type="hidden" name="codigo_p" value="<?php echo $fila['cod_producto']; ?>">      
                        <textarea name="reseña__" id="reseña__" placeholder=" Agregar comentario"></textarea>
                        <button class="btn" id="comentar" type="button">Comentar</button>
                        <!--<div id="mensaje"></div>-->
                    </form>    

                    <div class="media"></div>

                    <?php
                        $select = "SELECT * FROM reseñas WHERE cod_producto='$id'";
                        $result = $conexion-> query($select);

                        if(mysqli_num_rows($result) > 0){
                            while($fila = mysqli_fetch_assoc($result)){
                    ?>
                                <div class="testimonios">
                                    <div class="testimonios__contenedor">
                                        <div class="testimonios__caja">
                                            <div class="caja-top">
                                                <div class="perfil">
                                                    <div class="perfil-img">
                                                        <img src="<?php echo $_SESSION['foto']?>" alt="">
                                                    </div>
                                                    <div class="name-user">
                                                        <strong><?php echo $nombre." ". $apellido;?></strong>
                                                        <span>@<?php echo $fila['correo_electronico']?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="comentarios-clientes">
                                                <p>
                                                    <?php echo $fila['reseña']?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }else{
                            echo "<div class='titulo__'>";
                                echo "<h3>Se el primerio en comentar!</h3>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </section>
        </div>
    </main>

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


        function abrir(){
            document.getElementById('vent').style.display="block";
        }

        function cerrar(){
            document.getElementById('vent').style.display="none";
        }
    </script>
    
    <script src="../Scripts/Carrito.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#comentar').click(function(){
                var datos= $('#reseñas').serialize();
                /* $('#mensaje').html() */

                $.ajax({
                    type:'POST',
                    url:'../PHP_conectar/cconectar_reseña.php',
                    data:datos,
                    
                    success:function(r){
                        if(r==1){
                            $('#mensaje').html(datos)
                            alert('Guardado con exito');
                            document.getElementById('reseña').value='';
                        }else{
                            $('#mensaje').html(datos)
                            alert('Fallo el servidor');
                            document.getElementById('reseña').value='';
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>