<?php
    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    session_start();

    if(!empty($_POST["entrar"])){
        if(!empty($_POST['correo'])and!empty($_POST['contra'])){
            $correo=$_POST['correo'];
            $contraseña=$_POST['contra'];

            $consulta= mysqli_query($conexion, "SELECT * FROM clientes WHERE correo_electronico='$correo'");
            if (mysqli_num_rows($consulta) > 0) {
                $result = mysqli_fetch_assoc($consulta);
                $_SESSION['unique_id'] = $result['id_unique'];         
            }

            $sql=$conexion->query("select * from clientes where correo_electronico='$correo' and contraseña='$contraseña'");

            if($datos=$sql->fetch_object()){
                $_SESSION['correo']=$datos ->correo_electronico;
                $_SESSION['nombre']=$datos ->nombre;
                $_SESSION['apellido']=$datos ->apellido;
                $_SESSION['usuario']=$datos ->tipo_usuario;
                $_SESSION['telefono']=$datos ->telefono;
                $_SESSION['cedula']=$datos ->cedula;
                $_SESSION['contraseña']=$datos ->contraseña;
                $_SESSION['foto']=$datos ->foto;

                echo $_SESSION['usuario'];
                if( $_SESSION['usuario']=="Cliente"){
                    header("Location:../HTML/interfaz.php");
                }
                elseif( $_SESSION['usuario']=="Vendedor"){
                    header("Location:../HTML_VENDEDOR/Interfaz_vendedor.php");
                }
            }else{
                echo "<div> Acceso denegado</div>";
            }         
        }else{
            echo "Campos vacios";
        }
    }
?>