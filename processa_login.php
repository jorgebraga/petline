<?php

session_start();
include "conexao.php";

$login  = $_POST['login']; 
$pass   = sha1($_POST['pass']);

$sqlValidaLogin = "SELECT login, senha, perfil FROM usuario WHERE login = '$login' and senha = '$pass' and ativo = 1";
$resultadoValidaLogin = mysqli_query($conn,$sqlValidaLogin);
$contadorValidaLogin = mysqli_num_rows($resultadoValidaLogin);

if ($contadorValidaLogin > 0) {
    while ($linhaUsuario = $resultadoValidaLogin -> fetch_array(MYSQLI_ASSOC)) {

        $nome = $linhaUsuario['nome'];
        $login = $linhaUsuario['login'];
        $perfil = $linhaUsuario['perfil'];

        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        $_SESSION['perfil'] = $perfil;
    }
    header("location:http://www.petline.com.br/index.php");
}else {
    session_destroy();
    header("location:http://www.petline.com.br/login.php?e=1");
}

?>