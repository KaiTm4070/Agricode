<header>
    <div class="container_logo">
        <a id="menu__" href="javascript:abrir_menu()"><i class="fa-solid fa-bars"></i></a>

        <a href="interfaz_vendedor.php" class="logo">
            <img src="../Imagenes/sisarras.png">
        </a>
    </div>

<!--     <div class="busqueda">
        <input type="text" placeholder="Buscar">
        <div class="btn_busqueda"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></div>
    </div> -->

    <nav>
        <a href="Interfaz_vendedor.php" class="nav-link"><i class="fa-sharp fa-solid fa-person"></i> Inicio</a>
        <a href="pedidio.php" class="nav-link"><i class="fa-solid fa-bag-shopping"></i> Compras</a>
        <a href="Soporte_V.php" class="nav-link"><i class="fa-solid fa-phone"></i> Soporte</a>
    </nav>
</header>

<div class="container_menu" id="coso">
    <?php
        $conexion=mysqli_connect('localhost','root','','agricole');
        mysqli_set_charset($conexion,"utf8");        

        $correo= $_SESSION['correo'];
        $consulta="SELECT * FROM clientes WHERE correo_electronico='$correo'";
        $mostrar=mysqli_query($conexion, $consulta);
        
        if($mostrar){
            while($row=$mostrar->fetch_array()){
                $foto= $row['foto'];
                $nombre= $row['nombre'];
                $apellido= $row['apellido'];
                $telefono= $row['telefono'];
                $cedula= $row['cedula'];
                $contraseña= $row['contraseña'];
            }
        }
    ?>
    <div class="cont_Menu">
        <form class="Menu" id="Foto_perfil">
            <div class="coso">
                <div id="ver" class="img_perfil">
                    <img src="<?php echo  $foto;?>" class="img__">
                </div>
            </div>
    
            <div class="coso">
                <h3 class="nombre_perfil">
                    <?php
                        echo $nombre." ". $apellido;
                    ?>
                </h3>
            </div>
    
            <div class="coso">
                <h3>
                    Cedula: <?php echo $cedula?>
                </h3>
            </div>
    
            <div class="coso">
                <h4>
                    Correo: <?php echo $_SESSION["correo"]?>
                </h4>
            </div>
    
            <div class="coso">
                <h3>
                    Telefono: <?php echo $telefono?>
                </h3>
            </div>
    
            <div class="coso">
                <div class="bnt">
                    <!-- <div class="form_btn"></div> -->
                    <!-- <input type="file" name="foto" id="foto" accept=".jpg, .png, .jpeg"></input> -->
                </div>
            </div>
    
            <div class="coso_2">
                <button class="btn_perfil" id="btn_foto"><a href="../HTML_VENDEDOR/perfil_V.php?correo=<?php echo $_SESSION['correo']; ?>">Editar perfil</a></button>
            </div>
            <br>
            <div class="coso_2">
                <a href="../mensajeria_Vendedor/users.php?user_id=<?php echo $_SESSION['unique_id']; ?>" class="btn_perfil">Mensajes</a>
                <!-- <button class="btn_perfil" id="btn_foto"></button> -->
            </div>
    
            <div class="coso">
                <a href="../PHP_conectar/CerrarSecion.php" type="botton">Cerrar secion</a>
            </div>
            <br><br><br>
        </form>

        <a class="cerrar_menu" id="cerrar__menu" href="javascript:cerrar_menu()"><i class="fa-duotone fa-x"></i></a>
    </div>
</div>