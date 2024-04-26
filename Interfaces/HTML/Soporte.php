<?php
    session_start();

    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    }

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
    <link rel="stylesheet" href="../CSS/Soporte.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Soporte</title>
</head>
<body>
    <?php include '../HEADER-FOOTER/header.php';?>
    
    <main class="main">
        <div class="container">
            <section class="container-Soporte">
                <div class="Soporte">
                    <div class="container_titulo">
                        <div class="imagen">
                            <img src="../Imagenes/sisarras_2.png" alt="">
                        </div>
                        
                        <div class="Reportar_coso">
                            <h3>Reportar un problema</h3>
                            <p>
                                A nosotros nos interesa saber tus <br>  inquietudes
                                para poder mejorar tu experiencia
                            </p>
                        </div>
                    </div>

                    <section class="Reporte_problemas">
                        <div class="reporte">
                            <div class="media"></div>

                            <form action="" class="form_reporte" id="reporte_form">
                                <textarea name="comentario" id="comentario"  placeholder="Agregar comentario"></textarea>
                                <button class="btn" id="submit_btn">Enviar</button>
                            </form>
                        </div>
                        <div id="mensaje"></div>
                    </section>
                </div>
            </section>
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


        function abrir(){
            document.getElementById('vent').style.display="block";
        }

        function cerrar(){
            document.getElementById('vent').style.display="none";
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#submit_btn').click(function(){
                var datos=$('#reporte_form').serialize();

                $('mensaje').html()
                $.ajax({
                    type:'POST',
                    url:'../PHP_conectar/concectar_soporte.php',
                    data:datos,
                    
                    success:function(r){
                        if (r==1){
                            $('mensaje').html(datos)
                            alert('Enviado con exito');

                            document.getElementById('comentario').value='';
                        }else{
                            alert('Fallo el server');
                            document.getElementById('comentario').value='';
                        }
                    }
                });
                return false;
            });
        });
    </script>

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