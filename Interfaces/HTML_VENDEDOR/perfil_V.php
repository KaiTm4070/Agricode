<?php
  session_start();

  $conexion=mysqli_connect('localhost','root','','agricole');
  mysqli_set_charset($conexion,"utf8");

  $correo= $_GET['correo'];
  $consulta="SELECT * FROM clientes WHERE correo_electronico='$correo'";
  $resultado=mysqli_query($conexion, $consulta);

  if($resultado){
    while($row=$resultado->fetch_array()){
      $foto= $row['foto'];
      $nombre= $row['nombre'];
      $apellido= $row['apellido'];
      $telefono= $row['telefono'];
      $cedula= $row['cedula'];
      $contraseña= $row['contraseña'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../Imagenes/sisarras.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS_V/update_perfil.css">
  <link rel="stylesheet" href="../HEADER-FOOTER//footer.css">
  <link rel="stylesheet" href="../HEADER-FOOTER/header-vendedor.css">
  <script src="https://kit.fontawesome.com/b681d76c4c.js" crossorigin="anonymous"></script>
  <script src="jquery-3.2.1.min.js"></script>
  <title>Editar perfil</title>
</head>
<body>

  <?php include '../HEADER-FOOTER/header-vendedor.php';?>

  <div class="form-container">
    <form action="Update_PV.php?fotoxd=<?php echo $foto;?>" enctype="multipart/form-data" method="POST">
      <h2>Actualizar información de usuario</h2>

      <div id="ver" class="img_perfil">
        <img src="<?php echo $foto;?>" class="img__">
      </div>

      <label for="foto">Foto:</label>
      <input type="file" id="foto" name="foto" accept=".jpg, .png, .jpeg">

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $nombre?>">

      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" value="<?php echo $apellido?>">

      <label for="telefono">Teléfono:</label>
      <input type="text" id="telefono" name="telefono" value="<?php echo $telefono?>">

      <label for="cedula">Cedula:</label>
      <input type="text" id="cedula" name="cedula" value="<?php echo $cedula?>">

      <label for="contraseña">Contraseña:</label>
      <input type="password" id="contraseña" name="contraseña" value="<?php echo $contraseña?>">

      <button type="submit" name="actualizar">Actualizar</button>
      <br><br>
      <button><a href="Interfaz_vendedor.php">Cancelar</a></button>
    </form>
  </div>  

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
</body>
</html>