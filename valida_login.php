<?php

session_start();

if (isset($_SESSION['login']) and isset($_SESSION['pass'])) {

    $login = $_SESSION['login'];
    $pass = $_SESSION['pass'];

    $sqlValidaLogin = "SELECT login, senha FROM cliente WHERE login = '$login' and senha = '$pass'";
    $resultadoValidaLogin = mysqli_query($conn,$sqlValidaLogin);
    $contadorValidaLogin = mysqli_num_rows($resultadoValidaLogin);

    if ($contadorValidaLogin == 0) {
        session_destroy();
        header("location:login.php");
    }
}else {
    
    session_destroy();
    header("location:login.php");
    
}

?>