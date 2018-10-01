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
        </tr>
        <?php
            if ($contadorConsultaUsuario > 0) {
                while ($linhaUsuario = $resultadoConsultaUsuario -> fetch_array(MYSQLI_ASSOC)) {
                    $nome = $linhaUsuario['nome'];
                    $login = $linhaUsuario['login'];

                    echo "<tr>
                        <td>$nome</td>
                        <td>$login</td>
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