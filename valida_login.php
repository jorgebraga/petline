<?php

session_start();

if (isset($_SESSION['login']) and isset($_SESSION['perfil'])) {

    $login = $_SESSION['login'];
    $perfil = $_SESSION['perfil'];

    $sqlValidaLogin = "SELECT login, perfil FROM usuario WHERE login = '$login' and perfil = '$perfil' and ativo = 1";
    $resultadoValidaLogin = mysqli_query($conn,$sqlValidaLogin);
    $contadorValidaLogin = mysqli_num_rows($resultadoValidaLogin);

    if ($contadorValidaLogin == 0) {
        session_destroy();
        header("location:http://www.petline.com.br/login.php?e=1");
    }
}else {
    
    session_destroy();
    header("location:http://www.petline.com.br/login.php?e=2");
    
}

?>