<?php
    if($resultado -> num_rows > 0){
        while($fila = $resultado->fetch_assoc()){
            echo "<div class='item' onclick='cargar(this)'>";
                echo "<div class='contenedor-foto'>";
                    echo "<img src='".$fila['imagen']."'alt=''>";
                echo "</div>";

                echo "<div class='line'></div>";

                echo "<div class='contenedor-info'>";
                    echo "<div class='cosa'>";
                        echo "<div class='cosa2'>";
                            echo "<h3 class='nombre'><a href='../HTML/compra.php?id=". $fila['cod_producto'] ."'>".$fila['nombre_produto']."</a></h3>";
                            echo "<p class='categoria'>".$fila['categoria']."</p>";
                            echo "<span class='precio'>".$fila['precio_g']."</span>";
                        echo"</div>";
                    echo "</div>";
                
                echo "</div>";
            echo "</div>";
        }
    }else{
        echo "<div class='titulo__'>";
            echo "<h3>No se encontraron resultados.</h3>";
        echo "</div>";
    }
?>