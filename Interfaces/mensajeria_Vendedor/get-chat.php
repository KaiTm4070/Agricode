<?php
    session_start();

    if (isset($_SESSION['unique_id'])) {
    
        $conexion = mysqli_connect('localhost','root','','agricole');
        mysqli_set_charset($conexion,"utf8");

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conexion, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM mensajeria LEFT JOIN clientes ON clientes.id_unique = mensajeria.outgoin_msg_id
                    WHERE (outgoin_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
                    OR (outgoin_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY Cod_Mensajes";
        $query = mysqli_query($conexion, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row['outgoin_msg_id'] === $outgoing_id) {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $row['mensaje'] . '</p>
                                    </div>
                                    </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/' . $row['img'] . '" alt="">
                                    <div class="details">
                                        <p>' . $row['mensaje'] . '</p>
                                    </div>
                                    </div>';
                }
            }
        } else {
            $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
        }
        echo $output;
    } else {
        header("location: ../HTML/inicio_secion.php");
    }