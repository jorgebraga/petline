<?php
include "../cabecalho.php";

$id = $_SESSION['id'];

if ($id == 1) {
    $sqlConsultaPet = "SELECT P.id, P.nome, P.raca, P.peso, P.cor, P.dt_nascimento, P.descricao, CONCAT(U.nome, ' ', U.sobrenome) as dono, P.ativo FROM pet P INNER JOIN usuario U ON P.id_usuario = U.id";
}else{
    $sqlConsultaPet = "SELECT P.id, P.nome, P.raca, P.peso, P.cor, P.dt_nascimento, P.descricao, CONCAT(U.nome, ' ', U.sobrenome) as dono, P.ativo FROM pet P INNER JOIN usuario U ON P.id_usuario = U.id WHERE P.id_usuario = $id";
}

$resultadoConsultaPet = mysqli_query($conn,$sqlConsultaPet);
$contadorConsultaPet = mysqli_num_rows($resultadoConsultaPet);
?>
<div id="conteudo">
    <h3>Consulta Pet</h3>
    <h4>Pesquise por uma palavra chave ou selecione o PET da lista</h4>
    <br>

    <div style="margin: auto; max-width: 300px;" align="left">
        <table>
            <tr>
                <td><input type="text" class="form-control" id="busca" name="busca"></td>
                <td><button type="button" class="btn btn-primary" id="busca">
                    <span class="glyphicon glyphicon-search"> </span>
                </button></td>
            <tr>
        </table>
    </div>

    <div style="margin: auto; max-width: 800px;" class="table-responsive panel panel-default">
    <table width=100% class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Raca</th>
            <th scope="col">Dono</th>
            <th></th>
        </tr>
    </thead>
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
                echo "<h4>Não existem pets cadastrados</h4>";
            }
        ?>
    </table>
    <div align="center">
        <h4>Para adicionar um novo PET <a href="http://www.petline.com.br/cadastro_pet.php">Clique Aqui</a></h4>
    </div>
    </div>
</div>

<?php
include "../rodape.php";
?>