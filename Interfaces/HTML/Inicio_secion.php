<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <link rel="stylesheet" href="../CSS/inicio_secion.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="logo">
        <img src="../Imagenes/sisarras.png">
    </div>
    
   <main>
        <div class="container">
            <div class="caja__atras">
                <div class="caja__atras-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar a la página</p>
                    <button id="inicio_secion-btn">Iniciar Sesión</button>
                </div>

                <div class="caja__atras-registrar">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesión</p>
                    <button id="registrarse-btn">Registrarse</button>
                </div>
            </div>
            <!--Formulario del login y registro-->
            <div class="contenedor__login-register">
                <!--Iniciar secion-->
                <form method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <h6>
                    <?php
                        include "../PHP_conectar/controlador.php";
                    ?>
                    </h6>
                    <input type="text" placeholder="Correo electrónico" name="correo" id="correo" class="xd__"/>
                    <input type="password" placeholder="Contraseña" name="contra" id="contra" class="xd__"/>
                    <input type="submit" name="entrar" id="entrar" class="btn__entrar" value="iniciar sesión">

                </form>
                <!--Registrarse-->
                <form action="" class="formulario__register" id="formulario" enctype="multipart/form-data">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Correo electrónico" id="correo_" name="correo_">
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre"> 
                    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
                    <input type="text" placeholder="Telefono" id="telefono" name="telefono">
                    <input type="text" placeholder="Cedula" id="cedula" name="cedula">
                    <input type="date" placeholder="Fecha de nacimiento" id="fecha" name="fecha">
                    <input type="text" placeholder="Tarjeta de credito" id="tarjeta" name="tarjeta">
                    <!-- <input type="hidden" name="foto" value="../Imagenes/usuario__.PNG"> -->
                    <select id="usuario" name="usuario">
                        <option>Vendedor</option>
                        <option>Cliente</option>
                    </select>
                    <input type="password" placeholder="Contraseña" id="contraseña" name="contraseña">
                    <button id="btn__guardar">Registrarse</button>
                    <div id="mensaje"></div>
                </form>
            </div>
        </div>
   </main>
   <script src="../Scripts/inicio_secion.js"></script>

   <script type="text/javascript">
        $(document).ready(function(){
            $('#btn__guardar').click(function(){
                var datos=$('#formulario').serialize();
                $('#mensaje').html()
                $.ajax({
                    type:"POST",
                    url:"../PHP_conectar/conectar.php",
                    data:datos,

                    success:function(r){
                        if(r==1){
                            $('#mensaje').html(datos)
                            alert("agregado con exito");
                            document.getElementById('correo_').value='';
                            document.getElementById('nombre').value='';
                            document.getElementById('apellido').value='';
                            document.getElementById('telefono').value='';
                            document.getElementById('cedula').value='';
                            document.getElementById('fecha').value='';
                            document.getElementById('tarjeta').value='';
                            document.getElementById('usuario').value='';
                            document.getElementById('contraseña').value='';
                        }else{
                            $('#mensaje').html(datos)
                            alert("agregado con exito");
                            document.getElementById('correo_').value='';
                            document.getElementById('nombre').value='';
                            document.getElementById('apellido').value='';
                            document.getElementById('telefono').value='';
                            document.getElementById('cedula').value='';
                            document.getElementById('fecha').value='';
                            document.getElementById('tarjeta').value='';
                            document.getElementById('usuario').value='';
                            document.getElementById('contraseña').value=''
                        }
                    }
                });

                return false;
            });
        });
   </script>
</body>
<!--<a href="../HTML/interfaz.html">Entrar</a>-->
</html>

<!--
───────────────────────────────────
─████████──████████─████████████───
─██░░░░██──██░░░░██─██░░░░░░░░████─
─████░░██──██░░████─██░░████░░░░██─
───██░░░░██░░░░██───██░░██──██░░██─
───████░░░░░░████───██░░██──██░░██─
─────██░░░░░░██─────██░░██──██░░██─
───████░░░░░░████───██░░██──██░░██─
───██░░░░██░░░░██───██░░██──██░░██─
─████░░██──██░░████─██░░████░░░░██─
─██░░░░██──██░░░░██─██░░░░░░░░████─
─████████──████████─████████████───
───────────────────────────────────
-->
