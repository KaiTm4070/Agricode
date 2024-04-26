<?php
    session_start();
    session_destroy();
    header("Location:../HTML/Inicio_secion.php");
?>