<?php

include "cabecalho.php";

$id = $_SESSION['id'];
$nome = utf8_decode($_POST['nome_pet']);
$raca = utf8_decode($_POST['raca']);
$cor = utf8_decode($_POST['cor']);
$peso = utf8_decode($_POST['raca']);
$dt_nascimento = $_POST['dt_nascimento'];
$descricao = utf8_decode($_POST['descricao_pet']);

$sqlCadastraPet = "INSERT INTO pet (nome, raca, cor, peso, dt_nascimento,descricao, id_usuario) VALUES ('$nome','$raca','$cor','$peso','$dt_nascimento','$descricao',$id)";

if (mysqli_query($conn,$sqlCadastraPet)) {
    echo '<script type="text/javascript">'; 
    echo "alert('Pet cadastrado com sucesso!');"; 
    echo 'window.location.href = "http://www.petline.com.br/consulta_pet.php";';
    echo '</script>';
}else{
    echo  "<script>alert('Não foi possivel cadastrar o PET, contate o Administrador');</script>";
    header("location:http://www.petline.com.br/cadastro_pet.php");
}

?>