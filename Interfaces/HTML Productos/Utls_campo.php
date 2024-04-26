<?php
    session_start();

    $correo = $_SESSION['correo'];
    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    $sql = "SELECT * FROM producto WHERE categoria='Utencilios del campo'";
    $resultado = $conexion-> query($sql);
?>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/busqueda.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="jquery-3.2.1.min.js"></script>
    <title>Agricole</title>
</head>
<body>
    <?php include '../HEADER-FOOTER/header.php';?>

    <main>
        <div id="vent" class="ventana">
            <div class="carrito_xd">
                <div id="cerrar"><a href="javascript:cerrar()"><i class="fa-solid fa-xmark"></i></a></div>
                <h2>Carrito</h2>

                <tbody></tbody>
            </div>
        </div>

        <div class="contenido">
            <div class="mostrador" id="mostrador">
                <div class="fila">
                    <?php include '../SELECTS-PHP/Productos-categoria.php';?>
                </div>
            </div>
        </div>
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