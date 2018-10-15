<?php
include "cabecalho.php";
?>

<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Cadastre seu PET</h2>
        </div>
        <form action="cadastra_pet.php" method="post" name="cadastro_pet" id="cadastro_pet">
            <div class="form-row">
                <div class="col-md-12">
                    <label for="nome_pet">Nome</label>
                    <input type="text" class="form-control" name="nome_pet" maxlength="255" id="nome_pet">
                </div>

                <div class="col-md-6">
                    <label for="raca">Raça</label>
                    <input type="text" class="form-control" name="raca" maxlength="255" id="raca">
                </div>

                <div class="col-md-6">
                    <label for="peso">Peso</label>
                    <input type="number" class="form-control" name="peso" maxlength="255" id="peso">
                </div>

                <div class="col-md-6">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" name="cor" maxlength="255" id="cor">
                </div>

                <div class="form-group col-md-6">
                    <label for="dt_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento">
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                    <label for="descricao_pet">Descrição</label>
                        <p><textarea class="form-control" name="descricao_pet" id="descricao_pet" cols="148" rows="10"></textarea></p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6" align="left">
                        <a href="http://www.petline.com.br/index.php" class="btn btn-danger">Cancelar</a>
                    </div>

                    <div class="col-md-6" align="right">
                        <button type="button" class="btn btn-primary" id="salvar_pet">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "rodape.php"; ?>