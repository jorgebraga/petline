<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
<body>

<?php
    include "conexao.php";
?>
    <form action="processa_login.php" method="POST">

    <div class="container" align="center">

        Digite os dados de acesso:
        <table cellpadding=5>
        <tr>
            <td><b>Login:</b></td>
            <td><input type="text" name="login" class="form-control"></td>    
            <tr>
            <tr>
            <td><b>Senha:</b></td>
            <td><input type="password" name="pass" class="form-control"></td>    
        </tr>
        <tr>
            <td colspan='2' align='right'>
                <input type="submit" class="btn btn-primary"></button>
            </td>
        </tr>
        </table>
        <p>Não possui login?<a href="cadastro_usuario.php"> Clique Aqui</a></p>
    </div>
    </form>