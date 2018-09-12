<?php

session_start();
include "conexao.php";

$login  = $_POST['login']; 
$pass   = $_POST['pass'];

$sqlValidaLogin = "SELECT login, senha FROM cliente WHERE login = '$login' and senha = '$pass'";
$resultadoValidaLogin = mysqli_query($conn,$sqlValidaLogin);
$contadorValidaLogin = mysqli_num_rows($resultadoValidaLogin);

if ($contadorValidaLogin > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['pass'] = $pass;
    header("location:index.php");
}else {
    session_destroy();
    header("location:login.php");
}

?>