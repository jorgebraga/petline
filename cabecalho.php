<?php
include "conexao.php";
include "valida_login.php";
$perfil = $_SESSION['perfil'];
$nome = $_SESSION['nome'];
$id = $_SESSION['id'];
?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/petline.css">

        <!-- jQuery library -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="js/valida_form.js?51"></script>

        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ações <span class="caret"></span></a>
          <?php
            switch ($perfil) {
              case 'adm':
                echo "
                <ul class='dropdown-menu'>
<<<<<<< HEAD
                  <li><a href='http://www.petline.com.br/consulta/consulta_usuario.php'>Consulta Usuário</a></li>
                  <li><a href='http://www.petline.com.br/consulta/consulta_pet.php'>Consulta PET</a></li>      
<<<<<<< HEAD
                  <li><a href='http://www.petline.com.br/cadastro_agenda.php'>Agenda</a></li>
                  <li><a href='http://www.petline.com.br/contrata_pacote.php'>Contrata Pacote</a></li>
=======
                  <li><a href='consulta/consulta_usuario.php'>Consulta Usuário</a></li>
                  <li><a href='cadastro_pet.php'>Cadastra PET</a></li>
=======
=======
                  <li><a href='consulta/consulta_usuario.php'>Consulta Usuário</a></li>
                  <li><a href='cadastro_pet.php'>Cadastra PET</a></li>
>>>>>>> Estilo pagina login v1
>>>>>>> Estilo pagina login v1
                  <li><a href='#'>Agenda</a></li>
                  <li><a href='#'>Consulta Pacote</a></li>
>>>>>>> Estilo pagina login v1
                  <li><a href='#'>Histórico Passeador</a></li>
                  <li><a href='#'>Histórico Cliente</a></li>
                </ul>";
                break;
              case 'pas':
                echo "
                <ul class='dropdown-menu'>
                  <li><a href='http://www.petline.com.br/cadastro_agenda.php'>Agenda</a></li>
                  <li><a href='#'>Histórico Passeador</a></li>
                </ul>";
                break;
              case 'cli':
                echo "
                <ul class='dropdown-menu'>
<<<<<<< HEAD
                  <li><a href='http://www.petline.com.br/consulta/consulta_pet.php'>Consulta PET</a></li>    
<<<<<<< HEAD
                  <li><a href='http://www.petline.com.br/contrata_pacote.php'>Contrata Pacote</a></li>
=======
                  <li><a href='http://www.petline.com.br/contrata_pacote.php'>Consulta Pacote</a></li>
>>>>>>> Estilo pagina login v1
=======
                  <li><a href='cadastro_pet.php'>Cadastra PET</a></li>
                  <li><a href='#'>Consulta Pacote</a></li>
>>>>>>> Estilo pagina login v1
                  <li><a href='#'>Histórico Cliente</a></li>
                </ul>";
                break;
          }
        ?>
      </li>
    </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="button" class="btn btn-primary" id="pesquisa"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nome;?><span class="caret"></span></a>
          <ul class='dropdown-menu'>
            <li><a href="http://www.petline.com.br/consulta/detalha_usuario.php?id=<?php echo $id; ?>">Perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Sobre</a></li>
<<<<<<< HEAD
            <li><a href="#" onclick="if(confirm('Tem certeza que deseja sair?')) <?php echo "window.location.href = 'http://www.petline.com.br/logout.php';" ?> ; return false"<span>Sair</span></a></li>
=======
            <li><a href="logout.php">Sair</a></li>
>>>>>>> Estilo pagina login v1
          </ul>
      </li>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>