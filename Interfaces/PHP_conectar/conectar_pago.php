<?php

    session_start();

    if(empty($_SESSION['correo'])){
        header("location:controlador.php");
    }

    $conexion=mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $nombre_cliente=$_SESSION['nombre'];
    $apellid0_cliente=$_SESSION['apellido'];
    $correo= $_SESSION['correo'];
    $m_p= $_POST['metodo_pago'];
    $barrio= $_POST['barrio'];
    $direccion= $_POST['direccion'];
    $dcrp= $_POST['descripcion'];
    $descripcion= $_POST['descripcion'];        
    $correo_cliente= $_SESSION['correo'];
    $precio_total= $_POST['precio_t'];



    $sql= "INSERT INTO  pago(correo_electronico, nombre, apellido, metodo_pago, Barrio, direccion, Descripcion,total_pago) 
    VALUES ('$correo', '$nombre_cliente', '$apellid0_cliente', '$m_p', '$barrio', '$direccion', '$dcrp', '$precio_total')";    
    echo mysqli_query($conexion,$sql);

    $car_query= mysqli_query($conexion, "SELECT * FROM carrito");
    while($product_item= mysqli_fetch_assoc($car_query)){
        $correo_vendedor= $product_item['correo_Vendedor'];
        $img_prod= $product_item['foto'];
        $nombre_prod= $product_item['nombre_producto'];
        $precio_p= $product_item['precio_p'];

        $pago= mysqli_query($conexion, "SELECT max(cod_pago) as codigo FROM pago");
        while($pagoitem= mysqli_fetch_assoc($pago)){
            $codigop= $pagoitem['codigo'];
        }
        echo $codigop;
        echo $correo_vendedor;
        echo $nombre_prod;
        echo $precio_p;

        $insert=  "INSERT INTO detalle_pago(cod_pago, correo_electronio, correo_cliente, nombre, apellido, nombre_producto, precio_p, img) 
            VALUES ('$codigop', '$correo_vendedor', '$correo_cliente', '$nombre_cliente', '$apellid0_cliente', '$nombre_prod', '$precio_p', '$img_prod')";
        echo mysqli_query($conexion,$insert);
    }

    $sql_delete = "DELETE FROM carrito";
    $resultado_delete = mysqli_query($conexion, $sql_delete);
?>