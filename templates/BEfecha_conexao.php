<?php

function fechaConexao($conn){
    $fecha=mysqli_close($conn);
    if(!$fecha){
        echo "nao fechou a conexao!";
        return false;
    }else{
        return true;
    }

}

?>