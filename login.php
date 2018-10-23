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
<<<<<<< HEAD
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
=======
    <header style="background-color: rgb(218, 240, 211);" > 
            <div>
                <ul class="nav navbar-nav">        
                    <li><a href="login.php">Home</a></li>
                    <li><a href="#secsobre">Sobre</a></li>
                    <li><a href="contact.asp">Parceiros</a></li>
                    <li><a href="#login">Login</a></li>
                    <li><a href="cadastro_usuario.php?cod">Cadastro</a></li>
                </ul>
                <div>
                    <img src="img/backlogo.jpg" alt="" style="width:100%;">
                </div>
            </div>
>>>>>>> 0826557062b10d6277d00ccb3ce69a6f2e52caba
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
<<<<<<< HEAD
=======

    <!--Seção Pacotes-->

                                            <!--Teste de slide-->
<section id="secpacote">
     <div class="container">
        <h2>Pacotes</h2>
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
      <div align="center">
      <h2>Se interessou por algum destes pacotes de passeios, cadastre em nosso site e adquira o seu!</h2>
      <button>Cadastre Aqui</button>
      </div>
</section>
    
                                            <!--Fim Teste de slide-->
    
   
    <!--Fim Seção Pacotes-->
>>>>>>> 0826557062b10d6277d00ccb3ce69a6f2e52caba
           
        
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