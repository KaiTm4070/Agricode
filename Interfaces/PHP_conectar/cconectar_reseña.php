<?php
    session_start();

    $correo=$_SESSION['correo'];
    if(empty($_SESSION['correo'])){
        header("location:../PHP_conectar/controlador.php");
    }

    $conexion=mysqli_connect('localhost','root','','agricole');

    $cod=$_POST['codigo_p'];
    $correo=$_SESSION['correo'];
    $reseña=$_POST['reseña__'];

    $sql="INSERT INTO reseñas(cod_producto, correo_electronico, reseña) 
        VALUES ('$cod','$correo','$reseña')";
    echo mysqli_query($conexion,$sql);

?>