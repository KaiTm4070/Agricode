<?php
    session_start();
  
    $correo = $_SESSION['correo'];
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $foto= $_GET['fotoxd'];
    if(isset($_REQUEST['actualizar'])){
        $nombre_imagen=$_FILES['foto']['name'];
        $temporal=$_FILES['foto']['tmp_name'];
        echo $temporal.'   ';
        $carpeta='../databas_img';
        $ruta=$carpeta.'/'.$nombre_imagen;

        if($ruta=="../databas_img/"){
            $ruta=$_GET['fotoxd'];
        }
        else{
            echo $ruta.'   ';
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }
    
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono= $_POST['telefono'];
        $cedula= $_POST['cedula'];
        $contraseña = $_POST['contraseña'];

        $sql="UPDATE clientes SET nombre='$nombre', apellido='$apellido', telefono='$telefono', cedula='$cedula', contraseña='$contraseña', foto='$ruta' WHERE correo_electronico='$correo'";

        $exacute=mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
        echo $exacute;

        if($exacute){
            header("Location: perfil_V.php");
        }else{
            echo "Error";    
        }
    }  
?>