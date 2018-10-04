<?php

session_start();

$perfilCliente=0;

if (isset($_GET['pc'])) {
    $perfilCliente = $_GET['pc'];
}

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

$nome = utf8_decode($_POST['nome']);
$sobrenome = utf8_decode($_POST['sobrenome']);
$email = $_POST['email'];
$dt_nascimento = $_POST['dt_nascimento'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$rua = utf8_decode($_POST['rua']);
$bairro = utf8_decode($_POST['bairro']);
$cidade = utf8_decode($_POST['cidade']);
$uf = $_POST['uf'];

if (isset($_GET['id'])) {

    //Alterar Usuário
    $id = $_GET['id'];
    $descricao = utf8_decode($_POST['descricaoAtualizar']);

}else{

    //Cadastrar Usuário
    $perfil = $_POST['perfil'];
    if (isset($_POST['descricao'])) {
        $descricao = utf8_decode($_POST['descricao']);
    }else{
        $descricao = null;
    }
    $login = $_POST['login'];
    $senha = sha1($_POST['senha']);
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
}


if (isset($id)) {
    $contadorVerificaDuplicidadeLogin = 0;
    $contadorVerificaDuplicidadeEmail = 0;
    $contadorVerificaDuplicidadeCpf = 0;

    $alertaSucesso = "Usuário Alterado com Sucesso!";
    $alertaErro = "Não foi possível alterar o usuário";
    $direcionamentoErro = "http://www.petline.com.br/consulta/detalha_usuario.php?id=$id";
    
}else{
    /*valida login*/
    $sqlVerificaDuplicidadeLogin = "SELECT login, perfil FROM usuario WHERE login = '$login' and perfil = '$perfil'";
    $resultadoVerificaDuplicidadeLogin = mysqli_query($conn,$sqlVerificaDuplicidadeLogin);
    $contadorVerificaDuplicidadeLogin = mysqli_num_rows($resultadoVerificaDuplicidadeLogin);
    /*valida email*/
    $sqlVerificaDuplicidadeEmail = "SELECT email FROM usuario WHERE email = '$email'";
    $resultadoVerificaDuplicidadeEmail = mysqli_query($conn,$sqlVerificaDuplicidadeEmail);
    $contadorVerificaDuplicidadeEmail = mysqli_num_rows($resultadoVerificaDuplicidadeEmail);
    /*valida cpf*/
    $sqlVerificaDuplicidadeCpf = "SELECT cpf FROM usuario WHERE cpf = '$cpf'";
    $resultadoVerificaDuplicidadeCpf = mysqli_query($conn,$sqlVerificaDuplicidadeCpf);
    $contadorVerificaDuplicidadeCpf = mysqli_num_rows($resultadoVerificaDuplicidadeCpf);

    $alertaSucesso = "Usuário Cadastrado com Sucesso!";
    $alertaErro = "Não foi possível cadastrar o usuário";
    $direcionamentoErro = "http://www.petline.com.br/cadastro_usuario.php";
}

if ($contadorVerificaDuplicidadeLogin == 0) {
    if ($contadorVerificaDuplicidadeEmail == 0) {
        if ($contadorVerificaDuplicidadeCpf == 0) {

            if (isset($id)) {
                $sqlInsereUsuario = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', dt_nascimento = '$dt_nascimento', telefone = '$telefone', cep = '$cep', rua = '$rua', bairro = '$bairro', cidade = '$cidade', uf = '$uf', descricao = '$descricao' WHERE id = '$id'";
            }else{
                $sqlInsereUsuario = "INSERT INTO usuario (nome,sobrenome,email,dt_nascimento,telefone,rg,cpf,cep,rua,bairro,cidade,uf,login,senha,perfil,descricao,ativo) VALUES ('$nome','$sobrenome','$email','$dt_nascimento','$telefone','$rg','$cpf','$cep','$rua','$bairro','$cidade','$uf','$login','$senha','$perfil','$descricao',1)";
            }
            $resultadoInsereUsuario = mysqli_query($conn,$sqlInsereUsuario);

            if ($sqlInsereUsuario) {
                echo '<script type="text/javascript">'; 
                echo "alert('$alertaSucesso');"; 
                echo 'window.location.href = "http://www.petline.com.br/index.php";';
                echo '</script>';
            }else {
                echo  "<script>alert('$alertaErro');</script>";
                header("location:$direcionamentoErro");
                }

        }else {
            echo  "<script>alert('Não foi possível cadastrar o usuário, o cpf já está sendo utilizado');</script>";
            echo "<script>window.history.back();</script>";
            }

    }else {
        echo  "<script>alert('Não foi possível cadastrar o usuário, o e-mail já está sendo utilizado');</script>";
        echo "<script>window.history.back();</script>";
        }
        
}else {
    echo  "<script>alert('Não foi possível cadastrar o usuário, o login já está sendo utilizado');</script>";
    echo "<script>window.history.back();</script>";
}

?>