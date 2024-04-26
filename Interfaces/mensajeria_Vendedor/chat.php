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
        <section class="chat-area">
            <header>
                <?php
                    $user_id = mysqli_real_escape_string($conexion, $_GET['user_id']);
                    $sql = mysqli_query($conexion, "SELECT * FROM clientes WHERE id_unique = '$user_id'");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    } else {
                        header("location: users.php");
                    }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../Imagenes/<?php echo $row['foto']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['nombre'] . " " . $row['apellido'] ?></span>
                </div>
            </header>
            <div class="chat-box">

            </div>

            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
  </div>

   

    <script>
        function abrir_menu(){
            document.getElementById('coso').style.visibility="visible";
            document.getElementById('coso').style.opacity="1";
        }

        function cerrar_menu(){
            document.getElementById('coso').style.visibility="hidden";
            document.getElementById('coso').style.opacity="0";
        }


        function abrir(){
            document.getElementById('vent').style.display="block";
        }

        function cerrar(){
            document.getElementById('vent').style.display="none";
        }
    </script>

    <script src="../Scripts/chat.js"></script>
</body>
</html>