<?php

    session_start();

    if(empty($_SESSION['correo'])){
        header("location:../PHP_conectar/controlador.php");
    }
    
    $conexion=mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");
    $Problema=$_POST['comentario'];
    $correo=$_SESSION['correo'];

    $sql="INSERT INTO soporte(problema, correo_electronico) 
        VALUES ('$Problema','$correo')";    
    echo mysqli_query($conexion,$sql);
?>