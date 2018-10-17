<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
        <!--Inicio da construção da HOME-->
    <!--Cabeçalho da pagina-->
    <header>   
    <ul class="nav navbar-nav">        
        <li><a href="login.php">Home</a></li>
        <li><a href="#secsobre">Sobre</a></li>
        <li><a href="contact.asp">Parceiros</a></li>
        <li><a href="#login">Login</a></li>
        <li><a href="cadastro_usuario.php?cod">Cadastro</a></li>
    </ul>
    <div id='imglogotop'>
        <img src="img/logo4.png" alt="">
    </div>
    </header>
    <!--Fim Cabeçalho da pagina-->

    <!--Seção Sobre-->
    <main id="secsobre" align="center">        
    <article> 
        <div class="col-sm-3 col-md-6" >
            <h1 align="center">Sobre</h1>            
            <div align="left">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor libero id vestibulum feugiat. Duis sodales dolor ac lorem malesuada porttitor. Integer at tristique augue, et fermentum tellus. Quisque scelerisque porta dolor sit amet viverra. Nam tempor vehicula turpis, nec egestas tellus tristique in. Nunc ut commodo arcu. Vivamus enim elit, aliquam vitae dui vel, commodo pulvinar felis. Cras bibendum velit sed felis convallis, eu tincidunt sapien auctor. In malesuada tempus aliquet. Curabitur bibendum, ante at mollis porttitor, massa quam laoreet erat, ac feugiat est risus quis felis. Morbi non magna tellus. Ut non dictum nibh. Pellentesque vitae tellus at purus commodo eleifend ac at libero. Donec a cursus mi.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor libero id vestibulum feugiat. Duis sodales dolor ac lorem malesuada porttitor. Integer at tristique augue, et fermentum tellus. Quisque scelerisque porta dolor sit amet viverra. Nam tempor vehicula turpis, nec egestas tellus tristique in. Nunc ut commodo arcu. Vivamus enim elit, aliquam vitae dui vel, commodo pulvinar felis. Cras bibendum velit sed felis convallis, eu tincidunt sapien auctor. In malesuada tempus aliquet. Curabitur bibendum, ante at mollis porttitor, massa quam laoreet erat, ac feugiat est risus quis felis. Morbi non magna tellus. Ut non dictum nibh. Pellentesque vitae tellus at purus commodo eleifend ac at libero. Donec a cursus mi.</p>
            </div>            
        </div>
    </article>    
        <div>
            <img id='imgsobre' class="img-rounded" src="img/p.png" alt="">
        </div>
    </main>
    <!--Fim Seção Sobre-->
           
        
    <!--Seção Login-->
    <section id="login">            
    <div style='margin-top: 10%'>
        <div class="container" align="center">
            <h1>Login</h1>
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
                    <button type="submit" class="btn btn-primary"> Entrar</button>
                </div>
            <p>Não possui login?<a href="cadastro_usuario.php?cod"> Clique Aqui</a></p>
        </div>
    </div>
    </section>
    <!--Fim Seção Login-->
    
    <!-- Rodape da pagina-->
    <footer id="rodape">
        <p>Alguns diretos reservados - Petline &copy; - 2018</p>
    </footer>
    <!-- Fim Rodape da pagina-->
    
    <!--Fim da construção da HOME-->

</form>