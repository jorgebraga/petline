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

    <!--Codigo e=1 é login ou senha invalidos -->
    <!--Codigo e=2 é página restrita -->
    
    <?php
        if(isset($_GET['e'])){
            $cod_erro = $_GET['e'];
            switch($cod_erro){
                case 1:
                    echo"<div class='alert alert-danger' role='alert'>Usuário ou senha inválidos.</div>";
                break;
                case 2:
                    echo"<div class='alert alert-danger' role='alert'>Página restrita, por favor, realizar o login.</div>";
                break;
            }
        }
    ?>
    <div style='margin-top: 10%'>
        <div class="container" align="center">
            Digite os dados de acesso:
                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" style="width:30%;" class="form-control" name="login">
                </div>

                <div class="form-group">
                    <label for="pass">Senha:</label>
                    <input type="password" style="width:30%;" class="form-control" name="pass">
                </div>

                <div class="form-group">
                    <label for="perfil">Perfil:</label>
                    
                    <select name="perfil" id="perfil">
                        <option value="cli">Cliente</option>
                        <option value="pas">Passeador</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Entrar</button>
                </div>
            <p>Não possui login?<a href="cadastro_usuario.php?cod"> Clique Aqui</a></p>
        </div>
    </div>

</form>