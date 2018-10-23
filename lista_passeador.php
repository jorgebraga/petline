<?php
include "cabecalho.php";

$id = $_SESSION['id'];

$sqlConsultaPacote = "SELECT id, dt_passeio, hora_inicio, hora_fim FROM pacote WHERE id_usuario = $id and ativo = 1";
$resultadoConsultaPacote = mysqli_query($conn,$sqlConsultaPacote);
$contadorConsultaPacote = mysqli_num_rows($resultadoConsultaPacote);
?>
<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Passeadores Disponíveis</h2>
        </div>
        <div class="panel panel-default col-md-12">
        
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Data Passeio</th>
                    <th scope="col">Hora Início</th>
                    <th scope="col">Hora Fim</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Selecionar</th>
                    </tr>
                </thead>
                <tbody>
            <?php 

            while ($linhaConsultaPacote = $resultadoConsultaPacote -> fetch_array(MYSQLI_ASSOC)) {
                $dt_passeio = $linhaConsultaPacote['dt_passeio'];
                $hora_inicio = $linhaConsultaPacote['hora_inicio'];
                $hora_fim = $linhaConsultaPacote['hora_fim'];

                $sqlListaPasseador = "SELECT A.dt_passeio, A.hora_inicio, A.hora_fim, CONCAT(U.nome, ' ', U.sobrenome) AS nome FROM agenda A INNER JOIN usuario U ON (A.id_usuario = U.id AND perfil = 'pas') WHERE A.dt_passeio = '$dt_passeio' AND A.ativo = 1";
                $resultadoListaPasseador = mysqli_query($conn,$sqlListaPasseador);
                $contadorListaPasseador = mysqli_num_rows($resultadoListaPasseador);
                
                if ($contadorListaPasseador > 0) {

                    while ($linhaListaPasseador = $resultadoListaPasseador -> fetch_array(MYSQLI_ASSOC)) {
                        $dt_passeio = $linhaListaPasseador['dt_passeio'];
                        $hora_inicio = $linhaListaPasseador['hora_inicio'];
                        $hora_fim = $linhaListaPasseador['hora_fim'];
                        $nome = $linhaListaPasseador['nome'];

                        echo " <tr>
                        <th></th>
                        <td>$dt_passeio</td>
                        <td>$hora_inicio</td>
                        <td>$hora_fim</td>
                        <td>$nome</td>";?>
                        <td width=10% align=center><a href="#" onclick="if(confirm('Tem certeza que deseja contratar este passeador?')) <?php echo "window.location.href = 'http://www.petline.com.br/contrata_passeador.php';" ?> ; return false" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Contratar</a></td>
                        <?php echo "</tr>";
                    }
                }
            }
            ?>                 
            </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6" align="left">
        <a href="http://www.petline.com.br/contrata_dia.php" class="btn btn-primary">Voltar</a>
    </div>

    <div class="col-md-6" align="right">
        <a href="http://www.petline.com.br/pagamento.php" class="btn btn-primary" id="pagamento">Avançar</a>
    </div>
</div>