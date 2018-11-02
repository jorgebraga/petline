<?php

session_start();

include "conexao.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlFinalizaPasseio = "UPDATE pacote SET ativo = 0 WHERE id = $id";

    if(mysqli_query($conn,$sqlFinalizaPasseio)){
        header("location:index.php");
    }
}
?>