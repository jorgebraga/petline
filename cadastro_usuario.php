<script>

    function validateNumber(evt) {
        var e = evt || window.event;
        var key = e.keyCode || e.which;

        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
        // numbers   
        key >= 48 && key <= 57 ||
        // Numeric keypad
        key >= 96 && key <= 105 ||
        // Backspace and Tab and Enter
        key == 8 || key == 9 || key == 13 ||
        // Home and End
        key == 35 || key == 36 ||
        // left and right arrows
        key == 37 || key == 39 ||
        // Del and Ins
        key == 46 || key == 45) {
            // input is VALID
        }
        else {
            // input is INVALID
            e.returnValue = false;
            if (e.preventDefault) e.preventDefault();
        }
    }

</script>

<?php

$pc = 0;

if (isset($_GET['cod'])) {
    
    $pc = 1;
    echo 
    "<html>
        <head>
            <link rel='stylesheet' href='css/bootstrap.min.css'>

            <!-- jQuery library -->
            <script src='http://code.jquery.com/jquery-1.9.1.js'></script>

            <script src='js/valida_form.js'></script>

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
    echo "<form action='cadastra_usuario.php?pc=$pc' method='post' name='cadastro_usuario' id='cadastro_usuario'>";
?>
            <div class="form-row">

                <div class="col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" maxlength="255" id="nome">
                </div>

                <div class="col-md-6">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" maxlength="255" id="sobrenome">
                </div>

            </div>

             <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" maxlength="255" id="email">
            </div>

            <div class="form-group col-md-6">
                <label for="dt_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento">
            </div>

            <div class="form-group col-md-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" maxlength="50" id="telefone" onkeydown="validateNumber(event);">
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" name="rg" maxlength="20" id="rg" onkeydown=validateNumber(event);>
                </div>

                <div class="col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" maxlength="20" id="cpf" onkeydown=validateNumber(event);>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="pais">Pais</label>
                    <select name="pais" class="form-control" id="pais">
                        <option selected value="0">Selecione...</option>
                        <option value="brasil">Brasil</option>
                    </select>
                </div>

                <div class="form-group col-md-6">

                    <label for="uf">UF</label>
                    <select name="uf" class="form-control" id="uf">
                        <option selected value="0">Selecione...</option>
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
                <input type="text" class="form-control" name="cidade" maxlength="255" id="cidade">
            </div>

            <div class="form-group col-md-12">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" maxlength="25" id="login">
            </div>

            <div class="form-group col-md-6">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" maxlength="50" id="senha">
            </div>

            <div class="form-group col-md-6">
                <label for="senha2">Confirme Sua Senha</label>
                <input type="password" class="form-control" name="senha2" maxlength="50" id="senha2">
            </div>

            <div class="form-group col-md-12">
                <label for="perfil">Perfil</label>
                
                <select name="perfil" class="form-control" style="width:15%" id="perfil">
                    <option value="0">Selecione...</option>
                    <option value="cli">Cliente</option>
                    <option value="pas">Passeador</option>
                </select>
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" id="salvar"> Salvar </button>
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