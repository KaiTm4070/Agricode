<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){

        $conexion = mysqli_connect('localhost','root','','agricole');
        mysqli_set_charset($conexion,"utf8");

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conexion, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conexion, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conexion, "INSERT INTO  `mensajeria`(`incoming_msg_id`, `outgoin_msg_id`, `mensaje`)
                                        VALUES ('$incoming_id', '$outgoing_id', '$message')") or die();
            
        }
    }else{
        header("location: ../HTML/Inicio_secion.php");
    }
?>