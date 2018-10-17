<?php

include "cabecalho.php";

$id = $_SESSION['id'];

if (isset($_GET['add'])) {
    $dt_inicio = $_POST['dt_inicio'];
    $dt_fim = $_POST['dt_fim'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];

    $sqlAdicionaDia = "INSERT INTO pacote (dt_inicio, dt_fim, hora_inicio, hora_fim, id_usuario, ativo) VALUES ('$dt_inicio','$dt_fim', '$hora_inicio', '$hora_fim', $id, 1)";
    
    if (!mysqli_query($conn,$sqlAdicionaDia)) {
        echo '<script type="text/javascript">'; 
        echo "alert('Não foi possível inserir o dia, favor entrar em contato com o administrador!');"; 
        echo '</script>';
    }
}


$pacote = $_POST['pacote_opcao'];
?>

<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Selecione os dias do Passeio</h2>
        </div>
        <form action="contrata_dia.php?add" method="post" name="contrata_dia" id="contrata_dia">
            <div class="form-row">
                <div class="col-md-3">
                    <label for="dt_inicio">Data Inicio</label>
                    <input type="date" class="form-control" name="dt_inicio" id="dt_inicio">
                </div>

                <div class="col-md-3">
                    <label for="dt_fim">Data Fim</label>
                    <input type="date" class="form-control" name="dt_fim" id="dt_fim">
                </div>

                <div class="col-md-2">
                    <label for="hora_inicio">Hora Inicio</label>
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                </div>

                <div class="col-md-2">
                    <label for="hora_fim">Hora Fim</label>
                    <input type="time" class="form-control" name="hora_fim" id="hora_fim">
                </div>

                <div class="col-md-2">
                    <label for="add">Adicionar</label> <br>
                    <button type="submit" class="btn btn-success glyphicon glyphicon-plus"></button>
                </div> <br>

                <div class="col-md-6" align="left">
                    <a href="http://www.petline.com.br/contrata_pacote.php" class="btn btn-primary">Voltar</a>
                </div>

                <div class="col-md-6" align="right">
                    <button type="button" class="btn btn-primary" id="salvar_pet">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "rodape.php";?>