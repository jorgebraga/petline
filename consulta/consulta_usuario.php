<?php
include "../cabecalho.php";

$sqlConsultaUsuario = "SELECT id, CONCAT(nome, ' ', sobrenome) AS nome, login, ativo, perfil FROM usuario";
$resultadoConsultaUsuario = mysqli_query($conn,$sqlConsultaUsuario);
$contadorConsultaUsuario = mysqli_num_rows($resultadoConsultaUsuario);
?>

    <h3>Consulta Usuário</h3>
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
            <th>Login</th>
            <th>Perfil</th>
            <th></th>
        </tr>
        <?php
            if ($contadorConsultaUsuario > 0) {
                while ($linhaUsuario = $resultadoConsultaUsuario -> fetch_array(MYSQLI_ASSOC)) {
                    $nome = $linhaUsuario['nome'];
                    $login = $linhaUsuario['login'];
                    $id = $linhaUsuario['id'];
                    $ativo = $linhaUsuario['ativo'];
                    $perfil = $linhaUsuario['perfil'];

                    echo "<tr>
                        <td width=50%>$nome</td>
                        <td width=15%>$login</td>
                        <td width=15%>$perfil</td>";
                    if ($ativo == 1) {
                        echo "
                        <td width=10% align=center><a href='http://www.petline.com.br/consulta/detalha_usuario.php?id=$id' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Alterar</a></td>";?>
                        <td width=10% align=center><a href="http://www.petline.com.br/consulta/deleta_usuario.php" onclick="if(confirm('Tem certeza que deseja desativar o usuário?')) <?php echo "window.location.href = 'http://www.petline.com.br/consulta/deleta_usuario.php?cod=$id';" ?> ; return false" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Desativar</a></td>
                        <?php echo "</tr>";
                    }else{
                        echo "
                        <td width=20% colspan=2 align=center><a href='http://www.petline.com.br/consulta/ativa_usuario.php?cod=$id' class='btn btn-success'><span class='glyphicon glyphicon-ok'></span> Ativar</a></td>
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