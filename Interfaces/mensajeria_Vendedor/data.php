<?php
    $selector= "SELECT * FROM clientes WHERE correo_electronico='dfg'";
    $resultado= mysqli_query($conexion, $selector);
    while($row2 = mysqli_fetch_assoc($resultado)){
        $sql2 = "SELECT * FROM mensajeria WHERE (incoming_msg_id = {$row2['id_unique']}
            OR outgoin_msg_id = {$row2['id_unique']}) AND (outgoin_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY Cod_Mensajes DESC LIMIT 1";
        $query3 = mysqli_query($conexion, $sql2);
        $row3 = mysqli_fetch_assoc($query3);
        (mysqli_num_rows($query3) > 0) ? $result = $row3['mensaje'] : $result = "No hay mensajes disponibles";
        (strlen($result) > 28 ? $msg = substr($result, 0, 28) ."..." : $msg = $result);
        if(isset($row3['outgoin_msg_id'])){
            ($outgoing_id == $row3['outgoin_msg_id']) ? $you = "Tu: " : $you = "";
        } else {
            $you = "";
        }

        ($outgoing_id == $row2['id_unique']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id=' . $row2['id_unique'] . '">
            <div class="content">
                <img src="../Imagenes/' . $row2['foto'] . '" alt="">
                <div class="details">
                    <span>' . $row2['nombre'] . " " . $row2['apellido'] . '</span>
                    <p>' . $you . $msg . '</p>
                </div>
            </div>
        </a>';

    /* ARREGLO XD */
    /*                 while ($row = mysqli_fetch_assoc($query)) {
                        $sql2 = "SELECT * FROM mensajeria WHERE (incoming_msg_id = {$row['id_unique']}
                                    OR outgoin_msg_id = {$row['id_unique']}) AND (outgoin_msg_id = {$outgoing_id} 
                                    OR incoming_msg_id = {$outgoing_id}) ORDER BY Cod_Mensajes DESC LIMIT 1";
                        $query2 = mysqli_query($conexion, $sql2);               
                                    if(mysqli_num_rows($query2) <> 0) {
                                        $row2 = mysqli_fetch_assoc($query2);
                                        (mysqli_num_rows($query2) > 0) ? $result = $row2['mensaje'] : $result = "No hay mensajes disponibles";
                                        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                                        if (isset($row2['outgoin_msg_id'])) {
                                            ($outgoing_id == $row2['outgoin_msg_id']) ? $you = "Tu: " : $you = "";
                                        } else {
                                            $you = "";
                                        }
                                        
                                        ($outgoing_id == $row['id_unique']) ? $hid_me = "hide" : $hid_me = "";
                                    
                                        $output .= '<a href="chat.php?user_id=' . $row['id_unique'] . '">
                                                        <div class="content">
                                                        <img src="../Imagenes/' . $row['foto'] . '" alt="">
                                                        <div class="details">
                                                            <span>' . $row['nombre'] . " " . $row['apellido'] . ' </span>
                                                            <p>' . $you . $msg . '</p>
                                                        </div>
                                                        </div>
                                                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                                                    </a>';
                                    }else{
                                        $output .= '<a href="chat.php?user_id=' . $row['id_unique'] . '">
                                                        no hay nada xd
                                                    </a>';
                                    }
                    
                    } */
    }
?>