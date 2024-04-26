<?php

    session_start();
        
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }
    /* $correo=$_SESSION['correo']; */

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chat.css">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <title>Mensajeria</title>
</head>
<body>
    <div class="wrapper">
        <section class="users">
        <header>
            <div class="content">
            <?php
            $sql = mysqli_query($conexion, "SELECT * FROM clientes WHERE id_unique = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <a href="../HTML_VENDEDOR/Interfaz_vendedor.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="../Imagenes/<?php echo $row['foto']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['nombre'] . " " . $row['apellido'] ?></span>
            </div>
            </div>
            <!-- <a href="php/logout.php?logout_id=<?php echo $row['id_unique']; ?>" class="logout">Cerrar Sesión</a> -->
        </header>
        <div class="search">
            <span class="text">Selecciona un usuario para iniciar el chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
            
        </div>
        </section>
    </div>

    <script src="../Scripts/users.js"></script>
</body>
</html>