<?php

session_start();

include "conexao.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlDelataDia = "DELETE FROM pacote WHERE id = $id";

    if(mysqli_query($conn,$sqlDelataDia)){
        header("location:contrata_dia.php");
    }
}
?>