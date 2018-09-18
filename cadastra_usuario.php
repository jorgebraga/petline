<?php

$perfilCliente   = $_GET['pc'];

if ($perfilCliente == 1) {
    
    echo 
    "<html>
        <head>
            <link rel='stylesheet' href='css/bootstrap.min.css'>

            <!-- jQuery library -->
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

            <!-- Latest compiled JavaScript -->
            <script src='js/bootstrap.min.js'></script>
        </head>
    <body>";

    include "conexao.php";
}else {
    include "cabecalho.php";
}

session_start();

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$dt_nascimento = $_POST['dt_nascimento'];
$telefone = $_POST['telefone'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$perfil = $_POST['perfil'];
$login = $_POST['login'];
$senha = sha1($_POST['senha']);

$sqlInsereUsuario = "INSERT INTO usuario (nome,sobrenome,email,dt_nascimento,telefone,rg,cpf,cep,rua,bairro,cidade,uf,login,senha,perfil) VALUES ('$nome','$sobrenome','$email','$dt_nascimento','$telefone','$rg','$cpf','$cep','$rua','$bairro','$cidade','$uf','$login','$senha','$perfil')";
$resultadoInsereUsuario = mysqli_query($conn,$sqlInsereUsuario);

if ($sqlInsereUsuario) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Usuário Cadastrado com Sucesso!");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
}else {
    echo  "<script>alert('Não foi possível cadastrar o usuário');</script>";
    header("location:cadastro_usuario.php");
}

?>