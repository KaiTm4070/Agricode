<?php
    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");
                                                    
    $productos= mysqli_query($conexion, "SELECT * FROM producto");

    for($i = 1; $i<= 4; $i++){
        echo "<section class='seccion_slider'>";
            for($j = 1; $j<=3; $j++){
                $resultado_productos= mysqli_fetch_assoc($productos);

                if(!$resultado_productos){
                    break;
                }
                
                ?>

                <form class="producto-slide" method="POST">
                    <a href="compra.php?id=<?php echo $resultado_productos['cod_producto'];?>"><img src="../databas_img/<?php echo $resultado_productos['imagen']; ?>" class="producto_img"></a>
                    <h3 class="producto_title"><a href="compra.php?id=<?php echo $resultado_productos["cod_producto"];?>?correoV=<?php $resultado_productos['correo_electronico'];?>"><?php  echo $resultado_productos["nombre_produto"]; ?></a></h3>
                    <span class="producto_precio">$<?php echo $resultado_productos["precio_g"]; ?></span>
                    <input type="hidden" name="nombre_producto" value="<?php echo $resultado_productos["nombre_produto"]; ?>">
                    <input type="hidden" name="precio_producto" value="<?php echo $resultado_productos["precio_g"]; ?>">
                    <input type="hidden" name="imagen_producto" value="<?php echo $resultado_productos['imagen']; ?>">
                    <input type="hidden" name="codigo_producto" value="<?php echo $resultado_productos['cod_producto']; ?>">
                    <input type="hidden" name="correo_vendedor" value="<?php echo $resultado_productos['correo_electronico']; ?>">
                    <br><br>
                    <div>
                        <!-- <i class='fa-solid fa-cart-shopping agregar__carro'> --><input type="submit" class="form_btn" value="Agregar al carrito" name="añadir_carrito"></i> 
                    </div>
                </form>
        <?php
            }
        echo "</section>";
    }
?>
