<?php

session_start();

include "../conexao.php";

if (isset($_GET['cod'])) {

    $codPet = $_GET['cod'];
    
    if (isset($_GET['ex'])) {
        $sqlAlteraPet = "UPDATE pet SET ativo = 0 WHERE id = $codPet";
    }else{
        $sqlAlteraPet = "UPDATE pet SET ativo = 1 WHERE id = $codPet";
    }
    if(mysqli_query($conn,$sqlAlteraPet)){
        header("location:http://www.petline.com.br/consulta/consulta_pet.php");
    }
}

?>