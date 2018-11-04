<?php

include "cabecalho.php";

$id = $_SESSION['id'];

if (isset($_GET['add'])) {

    $dt_passeio = $_POST['dt_passeio'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $descricao = utf8_decode($_POST['descricao_agenda']);

    $sqlAdicionaDia = "INSERT INTO agenda (dt_passeio, hora_inicio, hora_fim, id_usuario, descricao, ativo) VALUES ('$dt_passeio', '$hora_inicio', '$hora_fim', $id, '$descricao', 1)";
    $resultadoAdicionaDia = mysqli_query($conn, $sqlAdicionaDia);


}
?>
<div id="conteudo">
<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Selecione os dias da Agenda</h2>
        </div>
        <form action="cadastro_agenda.php?add" method="post" name="cadastro_agenda" id="cadastro_agenda">
            <div class="form-row">
                <div class="col-md-2">
                    <label for="dt_passeio">Data Agenda</label>
                    <input type="date" class="form-control" name="dt_passeio" id="dt_passeio">
                </div>

                <div class="col-md-2">
                    <label for="hora_inicio">Hora Inicio</label>
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                </div>

                <div class="col-md-2">
                    <label for="hora_fim">Hora Fim</label>
                    <input type="time" class="form-control" name="hora_fim" id="hora_fim">
                </div>

                <div class="col-md-5">
                    <label for="descricao_agenda">Descrição</label>
                    <input type="text" class="form-control" name="descricao_agenda" id="descricao_agenda">
                </div>

                <div class="col-md-1">
                    <label for="add">Adicionar</label> <br>
                    <button type="submit" class="btn btn-success glyphicon glyphicon-plus"></button>
                </div> <br>
                <?php
                    $sqlConsultaDia = "SELECT id, dt_passeio, hora_inicio, hora_fim, descricao FROM agenda WHERE id_usuario = $id";
                    $resultadoConsultaDia = mysqli_query($conn,$sqlConsultaDia);
                    $contadorConsultaDia = mysqli_num_rows($resultadoConsultaDia);
                ?>
                <div class="table-responsive panel panel-default col-md-12">
                <table width=100% class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Data Passeio</th>
                        <th scope="col">Hora Início</th>
                        <th scope="col">Hora Fim</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <?php 
                        if ($contadorConsultaDia > 0) {

                            while ($linhaConsultaDia = $resultadoConsultaDia -> fetch_array(MYSQLI_ASSOC)) {
                                $dt_passeio = $linhaConsultaDia['dt_passeio'];
                                $hora_inicio = $linhaConsultaDia['hora_inicio'];
                                $hora_fim = $linhaConsultaDia['hora_fim'];
                                $descricao = utf8_encode($linhaConsultaDia['descricao']);
                                $id_agenda = $linhaConsultaDia['id'];

                                echo " <tr>
                                    <th></th>
                                    <td>$dt_passeio</td>
                                    <td>$hora_inicio</td>
                                    <td>$hora_fim</td>
                                    <td>$descricao</td>";?>
                                    <td width=10% align=center><a href="#" onclick="if(confirm('Tem certeza que deseja excluir o dia?')) <?php echo "window.location.href = 'http://www.petline.com.br/deleta_dia_agenda.php?id=$id_agenda';" ?> ; return false" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                                    <?php echo "</tr>";
                            }
                        }else{
                            echo "<h4>Não existem dias selecionados</h4>";
                        }
                    ?>
                </table>
                </div>

                <div class="col-md-6" align="left">
                    <a href="http://www.petline.com.br/index.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php include "rodape.php";?>