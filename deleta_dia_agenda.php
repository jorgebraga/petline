<?php

session_start();

include "conexao.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlDeletaDia = "DELETE FROM agenda WHERE id = $id";

    if(mysqli_query($conn,$sqlDeletaDia)){
        header("location:cadastro_agenda.php");
    }
}
?>