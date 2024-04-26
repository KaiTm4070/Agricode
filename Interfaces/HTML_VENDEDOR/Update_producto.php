<?php
    $conexion=mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $img= $_GET['foto'];
    if(isset($_REQUEST['AModal'])){

        $nombre_imagen=$_FILES['imagen']['name'];
        $temporal=$_FILES['imagen']['tmp_name'];
        echo $temporal.'   ';
        $carpeta='../databas_img';
        $ruta=$carpeta.'/'.$nombre_imagen;
        if($ruta=="../databas_img/"){
            $ruta=$_GET['foto'];
        }
        else{
            echo $ruta.'   ';
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }

        $id= $_POST['cod_p'];
        $nombre= $_POST['Nombre'];
        $precio= $_POST['Precio'];

        $sql="UPDATE producto SET imagen='$ruta', nombre_produto='$nombre', precio_g='$precio' WHERE cod_producto='$id'";
        $exacute=mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
        echo $exacute;
        if($exacute){
            header("Location: Interfaz_vendedor.php");
        }else{
            echo "Error";    
        }
    }
?>

