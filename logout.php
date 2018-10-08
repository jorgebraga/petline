<?php

session_start();

if (isset($_SESSION['login'])) {

    session_destroy();
    header("location:http://www.petline.com.br/login.php");
}

?>