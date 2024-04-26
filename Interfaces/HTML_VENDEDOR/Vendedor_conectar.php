<?php
    session_start();

    if(empty($_SESSION['correo'])){
        header("location:../PHP_conectar/controlador.php");
    }

    $conexion=mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $correo=$_SESSION['correo'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $categoria=$_POST['categoria'];
    $foto=$_FILES['foto'];

    if($foto["type"]=="image/jpg" or $foto["type"]=="image/jpeg" or $foto["type"]=="image/png"){
        $nombre_imagen=$_FILES['foto']['name'];
        $temporal=$_FILES['foto']['tmp_name'];
        $carpeta='../databas_img';
        $ruta=$carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

        $sql="INSERT INTO producto(correo_electronico, nombre_produto, precio_g, categoria, imagen) 
            VALUES ('$correo','$nombre','$precio','$categoria', '$ruta')";
        echo $sql;
        $exacute=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
        echo $exacute;
        
    }else{
        echo "Debe seleccionar un archivo";
    }
?>

