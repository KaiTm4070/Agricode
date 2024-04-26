<header>
    <div class="container_logo">
        <a id="menu__" href="javascript:abrir_menu()"><i class="fa-solid fa-bars"></i></a>

        <a href="../HTML/interfaz.php" class="logo">
            <img src="../Imagenes/sisarras.png">
        </a>
    </div>
            

    <form class="busqueda" method="GET" action="../HTML/Buscar_productos.php">
        <input type="text" placeholder="Buscar" name="busqueda" id="busqueda" value="<?php echo $nombre?>">
        <button class="btn_busqueda" type="submit"><a href="../HTML/Buscar_productos.php"><i class="fa-solid fa-magnifying-glass"></i></a></button>
    </form>
            
    <script>
        const form = document.querySelector('form');
        const input = document.querySelector('input[type="text"]');

        form.addEventListener('submit', function(event) {
            if (input.value.trim() === ''){
                event.preventDefault(); 
                    alert('Por favor ingrese un término de búsqueda válido.');
            }
        });
    </script>
    <nav class="nav_header">
        <a href="../HTML/interfaz.php" class="nav-link"><i class="fa-solid fa-house"></i> Inicio</a>                
        <!-- <a href="../HTML/Info.php"><i class="fa-solid fa-tree"></i> Huertas</a> -->
                
        <?php
            $select_rows = mysqli_query($conexion, "SELECT * FROM `carrito`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
        ?> 
        <a href="../Carrito/Carrito.php" class="carrote"><i class="fa-solid fa-cart-shopping"></i></a><span class="nuemero_carrito"><?php echo $row_count; ?></span>
        
        <a href="../HTML/Soporte.php" class="nav-link"><i class="fa-solid fa-circle-info"></i> Soporte</a>
    </nav>
</header>
        
<div class="container_menu" id="coso">
    <?php        
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
                <a href="../HTML/perfil_Update.php?correo2=<?php echo $_SESSION['correo']; ?>" class="form_btn">Editar perfil</a>
            </div>
    
            <div class="coso">
                <a href="../PHP_conectar/CerrarSecion.php" type="botton">Cerrar secion</a>
            </div>
        </form>

        <a class="cerrar_menu" id="cerrar__menu" href="javascript:cerrar_menu()"><i class="fa-duotone fa-x"></i></a>
    </div>
</div>