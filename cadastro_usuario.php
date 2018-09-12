<?php
include "cabecalho.php";
?>

    <div class="container">

        <div class="col-md-12">

            <div class="page-header">
                <h2>Cadastre-se</h2>
            </div>

            <form>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="nome">Sobrenome</label>
                    <input type="text" class="form-control">
                </div>

            </div>

             <div class="form-group col-md-12">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="email@email.com">
            </div>

            <div class="form-group col-md-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" placeholder="(99) 999999999">
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg">
                </div>

                <div class="col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf">
                </div>

            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="pais">Pais</label>
                    <input type="text" class="form-control" id="pais">
                </div>

                <div class="form-group col-md-6">

                    <label for="inputState">UF</label>
                    <select id="inputState" class="form-control">
                        <option selected>-</option>
                        <option>AC</option>
                        <option>AL</option>
                        <option>AM</option>
                        <option>AP</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>DF</option>
                        <option>ES</option>
                        <option>GO</option>
                        <option>MA</option>
                        <option>MG</option>
                        <option>MS</option>
                        <option>MT</option>
                        <option>PA</option>
                        <option>PB</option>
                        <option>PE</option>
                        <option>PI</option>
                        <option>PR</option>
                        <option>RJ</option>
                        <option>RN</option>
                        <option>RO</option>
                        <option>RR</option>
                        <option>RS</option>
                        <option>SC</option>
                        <option>SE</option>
                        <option>SP</option>
                        <option>TO</option>
                    </select>

                </div>

            </div>

            <div class="form-group col-md-12">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade">
            </div>

            <div class="form-group col-md-6">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login">
            </div>

            <div class="form-group col-md-6">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha">
            </div>

                <input type="submit" class="btn btn-primary"></button>

            </form>
    </div>

<?php
include "rodape.php";
?>