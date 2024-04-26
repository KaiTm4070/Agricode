 <?php
    session_start();

    $correo = $_SESSION['correo'];
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    /* $cod= $_GET['id_ped']; */
    /* $pedidio= "SELECT * FROM detalle_pago WHERE correo_electronico='$correo'";
    $resultado= $conexion ->query($pedidio); */

    $pedidi= "SELECT * FROM detalle_pago WHERE correo_electronio= '$correo'";
    $resultado= $conexion ->query($pedidi);
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS_V/pedidio.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header-vendedor.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Agricole</title>
</head>
<body>

    <?php include '../HEADER-FOOTER/header-vendedor.php';?>

    <main>
        <div id="vent" class="ventana">
            <div class="carrito_xd">
                <div id="cerrar"><a href="javascript:cerrar()"><i class="fa-solid fa-xmark"></i></a></div>
                <h2>Carrito</h2>

                <tbody></tbody>
            </div>
        </div>

        <section class="contenido">
            <div class="mostrador">
                <div class="fila">
                    <?php
                        if(mysqli_num_rows($resultado)>0){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<div class='item'>";
                                    echo "<div class='contenedor-foto'>";
                                        echo "<h3>Poducto</h3>";
                                        echo "<img src='".$fila['img']."' alt=''>";
                                        echo "<span>".$fila['nombre_producto']."</span>";
                                    echo "</div>";

                                    echo "<div class='line'></div>";

                                    echo "<div class='contenedor-info'>";
                                        echo "<div class='cosa'>";
                                            echo "<div class='cosa2'>";
                                                echo "<h2>Comprado por</h2>";
                                                echo "<h3>".$fila['correo_cliente']."</h3>";
                                                echo "<span>".$fila['nombre']."</span>";
                                                echo "<span> </span>";
                                                echo "<span>" .$fila['apellido']."</span>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }else{
                            echo "<div class='titulo__'>";
                                echo "<h3>No te han comprado.</h3>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <?php include '../HEADER-FOOTER/footer.php';?>

    <script>
        function abrir_menu(){
            document.getElementById('coso').style.visibility="visible";
            document.getElementById('coso').style.opacity="1";
        }

        function cerrar_menu(){
            document.getElementById('coso').style.visibility="hidden";
            document.getElementById('coso').style.opacity="0";
        }
    </script>
    <script src="previsualizar.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn_foto').click(function(){
                var datos=new FormData($('#Foto_perfil')[0]);
                $('#mensaje').html();

                $.ajax({
                    url:'../PHP_conectar/foto_usuario.php',
                    type:'POST',
                    data: datos,
                    contentType:false,
                    processData:false,
                    success: function(datos){
                        $('#mensaje').html(datos)
                        alert("Guardado con exito");
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>