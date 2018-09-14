<?php

$pc = 0;

if (isset($_GET['cod'])) {
    
    $pc = 1;
    echo 
    "<html>
        <head>
            <link rel='stylesheet' href='css/bootstrap.min.css'>

            <!-- jQuery library -->
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

            <!-- Latest compiled JavaScript -->
            <script src='js/bootstrap.min.js'></script>
        </head>
    <body>";

    include "conexao.php";
}else {
    include "cabecalho.php";
}
?>

    <div class="container">

        <div class="col-md-12">

            <div class="page-header">
                <h2>Cadastre-se</h2>
            </div>
<?php
    echo "<form action='cadastra_usuario.php?pc=$pc' method='post'>";
?>
            <div class="form-row">

                <div class="col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>

                <div class="col-md-6">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome">
                </div>

            </div>

             <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="email@email.com">
            </div>

            <div class="form-group col-md-6">
                <label for="dt_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" name="dt_nascimento">
            </div>

            <div class="form-group col-md-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" placeholder="(99) 999999999">
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" name="rg">
                </div>

                <div class="col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf">
                </div>

            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="pais">Pais</label>
                    <input type="text" class="form-control" name="pais">
                </div>

                <div class="form-group col-md-6">

                    <label for="uf">UF</label>
                    <select name="uf" class="form-control">
                        <option selected>-</option>
                        <option value="ac">AC</option>
                        <option value="al">AL</option>
                        <option value="am">AM</option>
                        <option value="ap">AP</option>
                        <option value="ba">BA</option>
                        <option value="ce">CE</option>
                        <option value="df">DF</option>
                        <option value="es">ES</option>
                        <option value="go">GO</option>
                        <option value="ma">MA</option>
                        <option value="mg">MG</option>
                        <option value="ms">MS</option>
                        <option value="mt">MT</option>
                        <option value="pa">PA</option>
                        <option value="pb">PB</option>
                        <option value="pe">PE</option>
                        <option value="pi">PI</option>
                        <option value="pr">PR</option>
                        <option value="rj">RJ</option>
                        <option value="rn">RN</option>
                        <option value="ro">RO</option>
                        <option value="rr">RR</option>
                        <option value="rs">RS</option>
                        <option value="sc">SC</option>
                        <option value="se">SE</option>
                        <option value="sp">SP</option>
                        <option value="to">TO</option>
                    </select>

                </div>

            </div>

            <div class="form-group col-md-12">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade">
            </div>

            <div class="form-group col-md-6">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login">
            </div>

            <div class="form-group col-md-6">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha">
            </div>

            <div class="form-group col-md-12">
                <label for="perfil">Perfil</label>
                
                <select name="perfil" class="form-control" style="width:15%">
                    <option value="cli">Cliente</option>
                    <option value="pas">Passeador</option>
                </select>
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary"> Salvar </button>
                </div>

                <div class="col-md-6" align="right">
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>

            </div>

        </form>
    </div>

<?php
include "rodape.php";
?>