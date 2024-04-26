    <?php
    session_start();

    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");
    
    $cart_query = mysqli_query($conexion, "SELECT * FROM `carrito`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
       while ($pd = mysqli_fetch_assoc($cart_query)) {
          $product_quantity = $pd['cantidad_producto'];
          $product_price = $pd['precio_p'] * $pd['cantidad_producto'];
          $price_total += $product_price;
       };
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/pago.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php include '../HEADER-FOOTER/header.php';?>   

    <main>
        <form id="form_pago" method="POST">
            <section class="contenedor_imagen">
                <div class="mostrador">
                    <div class="fila">
                        <?php
                            $select_prod= mysqli_query($conexion, "SELECT * FROM carrito");
                            $total = 0;
                            $total_pagar = 0;
                            if(mysqli_num_rows($select_prod) > 0){
                                while($fetch_prod = mysqli_fetch_assoc($select_prod)){
                                    $total_price = number_format($fetch_prod['precio_p'] * $fetch_prod['cantidad_producto']);
                                    $total_pagar = $total += intval($total_price);
                        ?>            
                                    <div class="item">
                                        <div class="contenedor-foto">
                                            <img src="<?php echo $fetch_prod["foto"]; ?>" alt="" id="foto" name="foto">
                                        </div>
                        
                                        <div class="line"></div>
                        
                                        <div class="contenedor-info">
                                            <div class="cosa">
                                                <div class="cosa2">
                                                    <?php echo "<h3 class='nombre'><a href='../HTML/compra.php?id=". $fetch_prod['cod_producto'] ."'>".$fetch_prod['nombre_producto']."</a></h3>";?>
                                                    <p class="categoria">Cantidad: <?php echo $fetch_prod['cantidad_producto']; ?></p>
                                                    <span class="precio">Precio: $<?php echo $fetch_prod['precio_p']; ?></span>
                                                    <input type="hidden" name="nombre_producto" value="<?php echo $fetch_prod['nombre_producto'];?>">
                                                    <input type="hidden" name="imagen_producto" values="<?php echo $fetch_prod['foto'];?>">
                                                    <input type="hidden" name="precio_prod" value="<?php echo $fetch_prod['precio_p']?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                        <?php
                                }
                                
                            }else{
                                echo "<div class='titulo__'>";
                                    echo "<h3>Carrito vacio</h3>";
                                echo "</div>";
                            }
                        ?>
                        <div>
                            total pagar: $<?php echo $price_total?>
                            <input type="hidden" name="precio_t" value="<?php echo $price_total?>">
                        </div>
                    </div>
                </div>
            </section>

            <section class="contenedor_pago">
                <div class="correo">
                    <?php
                        $sql= mysqli_query($conexion,"SELECT * FROM pago");
                        $row= mysqli_fetch_assoc($sql);
                    ?>

                    <div class="contenedor-coso">
                        <label for="metodo_pago" class="formulario_label">Metodo Pago</label>

                        <div class="input" >
                            <select class="form_input" name="metodo_pago" id="metodo_pago">
                                <option>Contraentrega</option>
                            </select>
                        </div>
                    </div>

                    <div class="contenedor-coso">
                        <label for="barrio" class="formulario_label">Barrio</label>

                        <div class="contenedor-coso">
                            <input type="text" class="form_input" placeholder="Ej: Anronio nariño" name="barrio" id="barrio" required>
                        </div>
                    </div>
                    
                    <div class="contenedor-coso">
                        <label for="direccion" class="formulario_label">Direccion</label>

                        <div class="input">
                            <input type="text" class="form_input" placeholder="cra 28 #32a bis" name="direccion" id="direccion" required>
                        </div>
                    </div>

                    <div class="contenedor-coso">
                        <label for="descripcion" class="formulario_label">Descripcion</label>

                        <div class="input">
                            <input type="text" class="form_input" placeholder="Ej: Casa de 2 pisos" name="descripcion" id="descripcion" required>
                        </div>
                    </div>
                            
                    <div class="contenedor-coso">
                        <button class="form_btn" id="btn_compra">Comprar</button>
                    </div>

                    <input type="hidden" value="<?php echo $row['cod_pago'];?>" name="codigo_pago" id="codigo_pago">
                </div>
            </section>
        </form>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn_compra').click(function(){
                var datos=$('#form_pago').serialize();
                $('#mensaje').html()
 
                $.ajax({
                    type:"POST",
                    url:"../PHP_conectar/conectar_pago.php",
                    data:datos,

                    success:function(r){
                        if(r==1){
                            $('#mensaje').html(datos);
                            alert("Comprado con exito");

                            document.getElementById('metodo_pago').value='';
                            document.getElementById('barrio').value='';
                            document.getElementById('descripcion').value='';
                            document.getElementById('direccion').value='';
                        }else{
                            $('#mensaje').html(datos);
                            alert("Comprado con exito");
                            document.getElementById('metodo_pago').value='';
                            document.getElementById('barrio').value='';
                            document.getElementById('descripcion').value='';
                            document.getElementById('direccion').value='';
                        }
                    }
                });
                    
                return false;
                 /* $('#btn_compra').click(function(){
                    var datos=new FormData($('#form_pago')[0]);

                    $('#mensaje').html()

                    $.ajax({
                        url:'../PHP_conectar/conectar_pago.php',
                        type:'POST',
                        data: datos,
                        contentType:false,
                        processData:false,
                        success: function(datos){
                                $('#mensaje').html(datos)
                                alert("Guardado con exito");
                                document.getElementById('metodo_pago').value='';
                                document.getElementById('barrio').value='';
                                document.getElementById('descripcion').value='';
                                document.getElementById('direccion').value='';
                                document.getElementById('categoria').value='';
                        }
                    });
                    
                    return false;*/
                });  
        });

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
    </script>
</body>
</html>