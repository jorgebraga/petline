<?php
include "../cabecalho.php";

$sqlConsultaUsuario = "SELECT id, CONCAT(nome, ' ', sobrenome) AS nome, login FROM usuario";
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
    <table width=100% border=1>
        <tr>
            <th>Nome</th>
            <th>Login</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            if ($contadorConsultaUsuario > 0) {
                while ($linhaUsuario = $resultadoConsultaUsuario -> fetch_array(MYSQLI_ASSOC)) {
                    $nome = $linhaUsuario['nome'];
                    $login = $linhaUsuario['login'];
                    $id = $linhaUsuario['id'];

                    echo "<tr>
                        <td width=50%>$nome</td>
                        <td width=30%>$login</td>
                        <td width=10% align=center><a href='http://www.petline.com.br/consulta/detalha_usuario.php?id=$id'> <span class='glyphicon glyphicon-pencil'></span> </a></td>
                        <td width=10% align=center><a href='http://www.petline.com.br/consulta/deleta_usuario.php'> <span class='glyphicon glyphicon-trash'></span> </a></td>
                        </tr>";
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