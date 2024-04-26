<?php
    session_start();

    if(empty($_SESSION['correo'])){
        header("location: Inicio_secion.php");
    };
    $correo=$_SESSION['correo'];

    $conexion = mysqli_connect('localhost','root','','agricole');
    mysqli_set_charset($conexion,"utf8");

    if(isset($_POST['update_btn'])){
        $update_value= $_POST['update-cantidad'];
        $update_id= $_POST['update-cantidad-id'];
        $update_query= mysqli_query($conexion, "UPDATE carrito SET cantidad_producto= '$update_value' WHERE cod_pedido= '$update_id'");
        if($update_query){
            header('location:Carrito.php');
        };
    };

    if(isset($_GET['remove'])){
        $remove_id= $_GET['remove'];
        mysqli_query($conexion, "DELETE FROM carrito WHERE cod_pedido= '$remove_id'");
        header('location:Carrito.php');
    };

    if(isset($_GET['delete_all'])){
        mysqli_query($conexion, "DELETE FROM carrito");
        header('location:Carrito.php');
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../CSS/Carrito.css">
    <link rel="stylesheet" href="../HEADER-FOOTER/header.css">
    <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
    <title>Carrito</title>
</head>
<body>
    <?php include '../HEADER-FOOTER/header.php';?>
            
    <main>
        <div class="contenedor">
            <h1 class="titulo">
                Carrito de compras 
            </h1>
            <section class="carrito-compra">
            
                <table border="1"> 
                    <thead>
                        <th>Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>...</th>
                    </thead>
     
                    <tbody>
                        <?php include '../SELECTS-PHP/carrito-select.php'?>
                            <tr class="table-bottom">
                                <td> <a href="../HTML/interfaz.php" class="option-btn">Volver al inicio</a> </td>
                                <td colspan="3"> Total compra </td>
                                <td> $<?php echo $total_pagar; ?> </td>
                                <td> <a href="Carrito.php?delete_all" onclick="return confirm('¿Quieres eleminar todo?')" class="delete-btn"><i class="fas fa-trash"></i> Vaciar carrito</a> </td>
                            </tr>     
                     </tbody>
                 </table>

                 <div class="checkout-btn">
                    <a href="../HTML/pago.php" class="btn <?= ($total_pagar > 1) ? '' : 'disabled'; ?>">Comprar</a>
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

    <script src="../Script/NS.js"></script>
</body>
</html>