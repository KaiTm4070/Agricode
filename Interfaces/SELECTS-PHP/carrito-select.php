<?php
    $sql= mysqli_query($conexion, "SELECT * FROM carrito WHERE correo_electronico= '$correo'");
    $total_pagar= 0;

    if(mysqli_num_rows($sql) > 0){
        while($fetch_cart= mysqli_fetch_assoc($sql)){ 
?>
            <tr class="table-midle">
                <td> <img src="../databas_img/<?php echo $fetch_cart['foto'];?>" alt="" class="producto_img"> </td>
                <td> <?php echo $fetch_cart['nombre_producto'];?> </td>
                <td> $<?php echo $fetch_cart['precio_p'];?> </td>
                <td> 
                    <form action="" method="POST" class="form_productos">
                        <input type="hidden" name="update-cantidad-id" value="<?php echo $fetch_cart['cod_pedido']; ?>">
                        <input type="number" name="update-cantidad" min="1" value="<?php  echo $fetch_cart['cantidad_producto']; ?>">
                        <input type="submit" value="actualizar" name="update_btn">
                    </form>
                </td>
                <td>$<?php echo $sub_total = $fetch_cart['precio_p'] * $fetch_cart['cantidad_producto']; ?></td>
                <td><a href="Carrito.php?remove=<?php echo $fetch_cart['cod_pedido'];?>" onclick="return confirm('¿Deseas eleminar este producto?')" class="delete-btn"><i class="fas fa-trash"></i> Eliminar</a></td>
            </tr>
    <?php
            $total_pagar += $sub_total;
        }
    }
?>