<?php
    session_start();

    $correo = $_SESSION['correo'];
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");
                
    /* if($conexion -> connect_errno){
        die("Fallo de conexion: (".$conexion -> mysqli_connect_errno().")".$conexion -> mysqli_connect_errno());    
    } */
    
    $productos= "SELECT * FROM producto WHERE correo_electronico='$correo'";
    $resultado_productos=$conexion-> query($productos);

    if(isset($_GET['remove'])){
        $remove_id= $_GET['remove'];
        mysqli_query($conexion, "DELETE FROM producto WHERE cod_producto= '$remove_id'");
        header('location:Interfaz_vendedor.php');
    };
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS_V/Vendedor.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header-vendedor.css">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Agricole</title>
</head>
<body>

    <?php include '../HEADER-FOOTER/header-vendedor.php';?>
    
    <main>
        <div class="Container___SubirProdutos">
            <div class="centrar">
                <div class="Container_form">
                    <form class="Subir__Productos" id="Fomulario">
                        <section class="section_intoform">
                            <div class="Producto">
                                <label for="Nombre_Producto" class="formulario_label">Nombre del producto</label>

                                    <div class="input">
                                        <input type="text" class="form_input" placeholder="Nombre del producto" name="nombre" id="nombre">
                                    </div>
                                </div>

                                <div class="Producto">
                                    <label for="Precio_Producto" class="formulario_label">Precio del producto</label>

                                    <div class="input">
                                        <input type="text" class="form_input" placeholder="Precio del producto" name="precio" id="precio">
                                    </div>
                                </div>

                                <div class="Producto">
                                    <label for="Categoria" class="formulario_label">Categoria</label>

                                    <div class="input" >
                                        <select class="form_input" name="categoria" id="categoria">
                                            <option>Fertilizantes</option>
                                            <option>Composta</option>
                                            <option>Verduras</option>
                                            <option>Frutas</option>
                                            <option>Utencilios del campo</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="bnt">
                                <label for="foto" class="formulario_label">Subir foto</label>
                                <input type="file" class="" name="foto" id="foto" accept=".jpg, .png, .jpeg"></input>
                            </div>
    
                            <div class="bnt_">
                                <button class="form_btn2" id="btn_subir">Subir</button>
                            </div>
                        </section>

                        <section class="section_img">
                            <div class="img__">
                                <h3>Imagen</h3>
                            </div>

                            <div class="">
                                <div class="img2" id="ver">
                                    <img src="../Imagenes/sisarras.png" class="xddd" alt="" id="imagen">
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
            <!--<div id="mensaje"></div>-->
        </div>

        <div class="contenedor_titulo">
            <h2>Productos</h2>
        </div>

        <div class="contenido">
            <div class="mostrador" id="mostrador">
                <div class="fila">
                    <?php
                        if(mysqli_num_rows($resultado_productos) > 0){
                            while($fila = mysqli_fetch_assoc($resultado_productos)){
                                /* $_SESSION['email']=$fila['correo_electronico']; */
                    ?>
                                <div class="item">
                                    <div class="contenedor-foto">
                                        <img src="<?php echo $fila['imagen']?>">
                                    </div>
                                    <div class="line"></div>
                                    
                                    <div class="contenedor-info">
                                        <div class="cosa">
                                            <div class="cosa2">
                                                <h3 class="nombre"><?php echo $fila['nombre_produto']?></h3>
                                                <p class="categoria">Categoria <?php echo $fila['categoria']?></p>
                                                <span class="precio">Precio: <?php echo $fila['precio_g']?></span>
                                            </div>
                                        </div>

                                        <div class="cosa3">
                                            <a href="Interfaz_vendedor.php?remove=<?php echo $fila['cod_producto'];?>" onclick="return confirm('¿Deseas eleminar este producto?')" class="boton_eliminar" name="Eliminar_P">Eliminar producto</a>
                                            <p></p>
                                            <button class="boton_actializar" id="A<?php echo $fila['cod_producto']?>" onclick="openmodal(this)">Editar</button>
                                        </div>
                                    </div>
                                </div>

                                <dialog  id="modal<?php echo $fila['cod_producto']?>">
                                    <form action="Update_producto.php?foto=<?php echo $fila['imagen']; ?>" id="frmajax" enctype="multipart/form-data" method="POST">
                                        <div id="ver">
                                            <img id="imagen" src="<?php echo $fila['imagen']; ?>" alt="">
                                        </div>

                                        <h2>Foto Producto</h2>
                                        <input name="imagen" type="file" accept=".jpg, .png, .jpeg" >


                                        <p></p>
                                        <label>Nombre del producto</label>

                                        <input type="text" name="Nombre" value="<?php echo $fila['nombre_produto']; ?>">
                                        <p></p>

                                        <label>Precio</label>

                                        <input type="text" name="Precio" value="<?php echo $fila['precio_g']; ?>">
                                        <p></p>

                                        <div class="fila">
                                        </div>
                                        <button id="AModal" name="AModal">Editar</button>
                                        <input type="hidden" name="cod_p" value="<?php echo $fila['cod_producto']?>">
                                    </form>
                                    <button id="C<?php echo $fila['cod_producto']; ?>" name="cerrarmodal" onclick="cerrarmodal(this)">cerrar</button>               
                                </dialog>
                    <?php
                            }
                        }else{
                            echo "<div class='titulo__'>";
                                echo "<h3>No tienes productos</h3>";
                            echo "</div>";
                        }
                    ?> 
                </div>
            </div>
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

        function openmodal(dato){
            var placa="#modal"+dato.id.substring(1);
            const modaladd=document.querySelector(placa);
            modaladd.showModal();
        }

        
        function cerrarmodal(ce){
            var placa="#modal"+ce.id.substring(1);
            const modaladd=document.querySelector(placa);
            modaladd.close();
        }
    </script>
    <script src="previsualizar.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn_subir').click(function(){
                var datos=new FormData($('#Fomulario')[0]);

                $('#mensaje').html()

                $.ajax({
                    url:'Vendedor_conectar.php',
                    type:'POST',
                    data: datos,
                    contentType:false,
                    processData:false,
                    success: function(datos){
                        $('#mensaje').html(datos)
                        alert("Guardado con exito");
                        document.getElementById('nombre').value='';
                        document.getElementById('precio').value='';
                        /* document.getElementById('categoria').value=''; */
                    }
                });
                
                return false;
            });

            
        });
    </script>

<!--     <script type="text/javascript">
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
   <!--  <script src="xd.js"></script> -->
    <!-- <script src="pr.js"></script> -->
</body>
</html>