<?php

session_start();
include "conexao.php";

$login  = $_POST['login']; 
$pass   = sha1($_POST['pass']);
$perfil = $_POST['perfil'];

$sqlValidaLogin = "SELECT login, senha, perfil FROM usuario WHERE login = '$login' and senha = '$pass' and perfil = '$perfil'";
$resultadoValidaLogin = mysqli_query($conn,$sqlValidaLogin);
$contadorValidaLogin = mysqli_num_rows($resultadoValidaLogin);

if ($contadorValidaLogin > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['pass'] = $pass;
    $_SESSION['perfil'] = $perfil;
    header("location:index.php");
}else {
    session_destroy();
    header("location:login.php");
}

?>