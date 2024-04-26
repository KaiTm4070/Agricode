<?php
    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");
    
    if(!empty($_FILES['foto'])){
        $Imagen=$_FILES['foto'];
        $sql=$conexion->query("select * from perfil where foto='$Imagen'");
        if($datos=$sql->fetch_object()){
            $_SESSION["ruta"]=datos ->foto;

            header("Location: perfil_usuario.php");
        }
    }
?>