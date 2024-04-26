<?php
    session_start();

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM clientes where correo_electronico ='dfg'";
    $query = mysqli_query($conexion, $sql);
    $output = "";

    
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
    
?>