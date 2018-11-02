<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="css/menuhome.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="css/normalize.css"/>
        <script type="text/javascript" src="js/menuhome.js"></script>       
        
        <!-- Load an icon library to show a hamburger menu (bars) on small screens --> <!--Utilizado no menu-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <div>               
                <div class="topnav" id="myTopnav">
                    <a href="login.php" class="active">Home</a>
                    <a href="#secsobre">Sobre</a>
                    <a href="#secpacote">Pacotes</a>
                    <a href="#secparceiros">Parceiros</a>
                    <a href="#login">Login</a>
                    <a href="cadastro_usuario.php?cod">Cadastre-se</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div>
                    <img src="img/backlogo.jpg" alt="" style="width:100%;">
                </div>
            </div>
    </header>
    <!--Fim Cabeçalho da pagina-->

    <!--Seção Sobre-->
    <section id="secsobre" align="center">        
        <article> 
            <div class="col-sm-3 col-md-6" id="conttext"> <!--Arrumar-->
                <h1 align="center">Sobre</h1>            
                <div align="left">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor libero id vestibulum feugiat. Duis sodales dolor ac lorem malesuada porttitor. Integer at tristique augue, et fermentum tellus. Quisque scelerisque porta dolor sit amet viverra. Nam tempor vehicula turpis, nec egestas tellus tristique in. Nunc ut commodo arcu. Vivamus enim elit, aliquam vitae dui vel, commodo pulvinar felis. Cras bibendum velit sed felis convallis, eu tincidunt sapien auctor. In malesuada tempus aliquet. Curabitur bibendum, ante at mollis porttitor, massa quam laoreet erat, ac feugiat est risus quis felis. Morbi non magna tellus. Ut non dictum nibh. Pellentesque vitae tellus at purus commodo eleifend ac at libero. Donec a cursus mi.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor libero id vestibulum feugiat. Duis sodales dolor ac lorem malesuada porttitor. Integer at tristique augue, et fermentum tellus. Quisque scelerisque porta dolor sit amet viverra. Nam tempor vehicula turpis, nec egestas tellus tristique in. Nunc ut commodo arcu. Vivamus enim elit, aliquam vitae dui vel, commodo pulvinar felis. Cras bibendum velit sed felis convallis, eu tincidunt sapien auctor. In malesuada tempus aliquet. Curabitur bibendum, ante at mollis porttitor, massa quam laoreet erat, ac feugiat est risus quis felis. Morbi non magna tellus. Ut non dictum nibh. Pellentesque vitae tellus at purus commodo eleifend ac at libero. Donec a cursus mi.</p>
                </div><br>            
            </div>
            <div>
                <img id='imgsobre' class="img-rounded" src="img/p.png" alt="">
            </div>
        </article>    
        
    </section><br>
    <!--Fim Seção Sobre-->

    <!--Seção Pacotes-->

<!--Inicio do slider (apresentação dos pacotes em slides)-->
 
<section id="secpacote">
    <h2 align="center">Detalhes sobre os nossos pacotes</h2>

    <div class="container" id="slidepacotes" style="width:100%;">        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      
          <!-- Wrapper for slides -->
            <div class="carousel-inner">
      
                <div class="item active">
                    <img src="img/Pacote Line Basic.jpg" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Line Basic</h3>
                        <p>Pacote basico PetLine</p>
                    </div>
                </div>
        
                <div class="item">
                    <img src="img/Pacote Line Basic.jpg" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Rich Dog</h3>
                        <p>Pacote PetLine</p>
                    </div>
                </div>
            
                <div class="item">
                    <img src="img/Pacote Line Basic.jpg" alt="New York" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Golden Dog</h3>
                        <p>Pacote Premiun PetLine</p>
                    </div>
                </div>            
            </div>
                  
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
<!--Fim do slider-->

<!--Seção do accordion (descrições dos pacotes que substituem o slider após reduzir o tamanho de tela) --> 
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    Pacote Line Basic</a>
                </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Pacote Rich Dog</a>
                </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Pacote Golden Dog</a>
                </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
                </div>
            </div>
        </div>
    <!-- FIM Seção do accordion -->
    <div align="center">
        <h2>Se interessou por algum destes pacotes de passeios, cadastre em nosso site e adquira o seu!</h2>        
        <a href="cadastro_usuario.php?cod"><button type="button" class="btn btn-primary btn-block"> Cadastre Aqui</button></a>
    </div>
</section>
    <!--Fim Seção Pacotes-->
    <!--Seção de parceiros-->
    <section id="secparceiros">
        <div>
            <h1 align="center">Parceiros</h1>
        </div><br>
        <div class="flex-container">
            <div>
                <img src="img/unieuro2.png" alt="">
            </div><br>
            <div>
                <img src="img/unieuro2.png" alt="">
            </div><br>
            <div>
                <img src="img/unieuro2.png" alt="">
            </div><br>
        </div>    
    </section>    
    <!--Fim Seção de parceiros-->
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
    <footer>
        <div id="rodape">
            <div align="left">
                <h4>Contato</h4>
                <p>Email: passeios.petline@gmail.com</p>
            </div>
            <p>Alguns diretos reservados - Petline &copy; - 2018</p>
        </div>               
    </footer>
    <!-- Fim Rodape da pagina-->
    
    <!--Fim da construção da HOME-->

</form>