<?php
include "../cabecalho.php";

$sqlConsultaPet = "SELECT P.id, P.nome, P.raca, P.peso, P.cor, P.dt_nascimento, P.descricao, CONCAT(U.nome, ' ', U.sobrenome) as dono, P.ativo FROM pet P INNER JOIN usuario U ON P.id_usuario = U.id";
$resultadoConsultaPet = mysqli_query($conn,$sqlConsultaPet);
$contadorConsultaPet = mysqli_num_rows($resultadoConsultaPet);
?>

    <h3>Consulta Pet</h3>
    <h4>Pesquise por uma palavra chave ou selecione o usuario na lista</h4>
    <br>

    <div style="margin: auto; max-width: 300px;">
        <table>
            <tr>
                <td><input type="text" class="form-control" id="busca" name="busca"></td>
                <td><button type="button" class="btn btn-primary" id="busca">
                    <span class="glyphicon glyphicon-search"> </span>
                </button></td>
            <tr>
        </table>
    </div>

    <div style="margin: auto; max-width: 800px;">
    <table width=100%>
        <tr>
            <th>Nome</th>
            <th>Raca</th>
            <th>Dono</th>
            <th></th>
        </tr>
        <?php
            if ($contadorConsultaPet > 0) {
                while ($linhaPet = $resultadoConsultaPet -> fetch_array(MYSQLI_ASSOC)) {
                    $nome = $linhaPet['nome'];
                    $raca = $linhaPet['raca'];
                    $id = $linhaPet['id'];
                    $ativo = $linhaPet['ativo'];
                    $dono = $linhaPet['dono'];

                    echo "<tr>
                        <td width=50%>$nome</td>
                        <td width=30%>$raca</td>
                        <td width=30%>$dono</td>";
                    if ($ativo == 1) {
                        echo "
                        <td width=10% align=center><a href='http://www.petline.com.br/consulta/detalha_pet.php?id=$id' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Alterar</a></td>";?>
                        <td width=10% align=center><a href="#" onclick="if(confirm('Tem certeza que deseja desativar o PET?')) <?php echo "window.location.href = 'http://www.petline.com.br/consulta/altera_pet.php?cod=$id&ex=1';" ?> ; return false" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Desativar</a></td>
                        <?php echo "</tr>";
                    }else{
                        echo "
                        <td width=20% colspan=2 align=center><a href='http://www.petline.com.br/consulta/altera_pet.php?cod=$id' class='btn btn-success'><span class='glyphicon glyphicon-ok'></span> Ativar</a></td>
                        </tr>";
                    }
                }
            }else{
                echo "<h4>Não existem usuario cadastrados</h4>";
            }
        ?>
    </table>
    </div>

<?php
include "../rodape.php";
?>