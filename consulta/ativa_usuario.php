<?php

session_start();

include "../conexao.php";

if (isset($_GET['cod'])) {

    $codUsuario = $_GET['cod'];
    $sqlDesativaUsuario = "UPDATE usuario SET ativo = 1 WHERE id = $codUsuario";

    if(mysqli_query($conn,$sqlDesativaUsuario)){
        header("location:http://www.petline.com.br/consulta/consulta_usuario.php");
    }
}

?>