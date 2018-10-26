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
        <div class="panel panel-default col-md-6">
        
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Selecionar</th>
                    </tr>
                </thead>
                <tbody>
            <?php

            $sqlValidaPasseador = "SELECT A.id_usuario FROM pacote P LEFT JOIN agenda A ON (A.dt_passeio = P.dt_passeio) WHERE	A.dt_passeio IS NULL";
            $resultadoValidaPasseador = mysqli_query($conn,$sqlValidaPasseador);
            $contadorValidaPasseador = mysqli_num_rows($resultadoValidaPasseador);

            $arrayIndisponiveis = [];

            if ($contadorValidaPasseador > 0) {

                while ($linhaValidaPasseador = $resultadoValidaPasseador -> fetch_array(MYSQLI_ASSOC)) {
                    array_push($arrayIndisponiveis, $linhaValidaPasseador['id_usuario']);        
                }
                echo "<tr><th scope='col' colspan=4 align=center>Não existem passeadores disponíveis</th></tr>";
            }else{

                $totalArray = count($arrayIndisponiveis);
                
                if ($totalArray > 0) {

                    $listaPasseadorIndisponivel = implode($arrayIndisponiveis,',');
                    $sql = "SELECT CONCAT(U.nome, ' ', U.sobrenome) AS nome FROM agenda A INNER JOIN usuario U ON (A.id_usuario = U.id AND U.perfil = 'pas') WHERE A.id_usuario NOT IN ($listaPasseadorIndisponivel) GROUP BY A.id_usuario";
                    
                } else {
                    $sql = "SELECT CONCAT(U.nome, ' ', U.sobrenome) AS nome FROM agenda A INNER JOIN usuario U ON (A.id_usuario = U.id AND U.perfil = 'pas') GROUP BY A.id_usuario";
                }

                $resultadoPasseadorDisponivel = mysqli_query($conn,$sql);

                while ($linhaPasseadorDisponivel = $resultadoPasseadorDisponivel -> fetch_array(MYSQLI_ASSOC)) {
                    $nome = $linhaPasseadorDisponivel['nome'];

                    echo " <tr>
                    <th></th>
                    <td>$nome</td>";?>
                    <td width=10% align=center><a href="#" onclick="if(confirm('Tem certeza que deseja contratar este passeador?')) <?php echo "window.location.href = 'http://www.petline.com.br/contrata_passeador.php';" ?> ; return false" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Contratar</a></td>
                    <?php echo "</tr>";
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