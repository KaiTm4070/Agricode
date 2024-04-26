<?php
    session_start();
    $conexion=mysqli_connect('localhost','root','','agricole');

    $correo_electronico=$_POST['correo_'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $cedula=$_POST['cedula'];
    $fecha=$_POST['fecha'];
    $tarjeta=$_POST['tarjeta'];
    $tipo__usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    /* $foto= $_POST['foto']; */
    $ran_id = rand(time(), 100000000);

    

    $sql="INSERT INTO clientes(correo_electronico, id_unique, nombre, apellido, telefono, cedula, fecha, tarjeta_C, tipo_usuario, contraseña, foto) 
        VALUES ('$correo_electronico','$ran_id','$nombre','$apellido','$telefono','$cedula','$fecha','$tarjeta','$tipo__usuario','$contraseña', '../Imagenes/usuario__.PNG')";
    echo mysqli_query($conexion,$sql);


?>