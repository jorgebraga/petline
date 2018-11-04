<?php
include "cabecalho.php";
$perfil = $_SESSION['perfil'];
$id = $_SESSION['id'];

if ($perfil == 'pas') {
    
    $sqlIndexPasseador = "SELECT DISTINCT
    CONCAT(U1.nome,' ',U1.sobrenome) as cliente_passeio,
    P.dt_passeio,
    P.hora_inicio,
	P.hora_fim,
    PE.nome as nome_pet,
    P.ativo as passeio_realizado,
    P.id as id_pacote
    FROM servico S
    INNER JOIN usuario U ON (S.id_passeador = U.id AND U.perfil = 'pas')
    INNER JOIN usuario U1 ON (S.id_cliente = U1.id AND U1.perfil = 'cli')
    INNER JOIN pacote P ON (P.id_usuario = U1.id)
    INNER JOIN pet PE ON (PE.id = S.id_pet)
    WHERE
    U.id = $id
    AND PE.ativo = 1
    AND P.ativo = 1";
    $resultadoSqlIndexPasseador = mysqli_query($conn,$sqlIndexPasseador);
    $contadorIndexPasseador = mysqli_num_rows($resultadoSqlIndexPasseador);
?>
<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Passeios a Serem Realizados</h2>
        </div>
        <div class="panel panel-default">
        
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data Passeio</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Termino</th>
                    <th scope="col">Nome Pet</th>
                    <th scope="col">Passeio Realizado?</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                if ($contadorIndexPasseador > 0) {
                    while ($linhaIndexPasseador = $resultadoSqlIndexPasseador -> fetch_array(MYSQLI_ASSOC)) {
                        $id_pacote = $linhaIndexPasseador['id_pacote'];
                        $cliente_passeio = $linhaIndexPasseador['cliente_passeio'];
                        $dt_passeio = $linhaIndexPasseador['dt_passeio'];
                        $hora_inicio = $linhaIndexPasseador['hora_inicio'];
                        $hora_fim = $linhaIndexPasseador['hora_fim'];
                        $nome_pet = $linhaIndexPasseador['nome_pet'];

                        echo "<tr>
                            <td width=20%>$cliente_passeio</td>
                            <td width=10%>$dt_passeio</td>
                            <td width=10%>$hora_inicio</td>
                            <td width=10%>$hora_fim</td>
                            <td width=10%>$nome_pet</td>";?>
                            <td width=10% align=center><a href="#" onclick="if(confirm('Tem certeza que deseja finalizar esse passeio?')) <?php echo "window.location.href = 'http://www.petline.com.br/finaliza_passeio.php?id=$id_pacote';" ?> ; return false" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a></td>
                            <?php echo "</tr>";
                    }
                }else{
                    echo "<h4>Não existem PETs cadastrados</h4>";
                }
            ?>                 
            </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6" align="left">
        <a href="http://www.petline.com.br/finaliza_servico.php" class="btn btn-success">Finalizar Serviço</a>
    </div>
</div>
<?php }else if ($perfil == 'cli'){

        $sqlIndexCliente = "SELECT DISTINCT
        CONCAT(U.nome,' ',U.sobrenome) as passeador,
        P.dt_passeio,
        P.hora_inicio,
        P.hora_fim,
        PE.nome as nome_pet,
        P.ativo as passeio_realizado,
        P.id as id_pacote
        FROM servico S
        INNER JOIN usuario U ON (S.id_passeador = U.id AND U.perfil = 'pas')
        INNER JOIN usuario U1 ON (S.id_cliente = U1.id AND U1.perfil = 'cli')
        INNER JOIN pacote P ON (P.id_usuario = U1.id)
        INNER JOIN pet PE ON (PE.id = S.id_pet)
        WHERE
        U1.id = $id
        AND PE.ativo = 1
        AND P.ativo = 1";
    $resultadoSqlIndexCliente = mysqli_query($conn,$sqlIndexCliente);
    $contadorIndexCliente = mysqli_num_rows($resultadoSqlIndexCliente);
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Passeios a Serem Realizados</h2>
            </div>
            <div class="panel panel-default">
            
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Passeador</th>
                        <th scope="col">Data Passeio</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Nome Pet</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    if ($contadorIndexCliente > 0) {
                        while ($linhaIndexCliente = $resultadoSqlIndexCliente -> fetch_array(MYSQLI_ASSOC)) {
                            $passeador = $linhaIndexCliente['passeador'];
                            $dt_passeio = $linhaIndexCliente['dt_passeio'];
                            $hora_inicio = $linhaIndexCliente['hora_inicio'];
                            $hora_fim = $linhaIndexCliente['hora_fim'];
                            $nome_pet = $linhaIndexCliente['nome_pet'];
    
                            echo "<tr>
                                <td width=20%>$passeador</td>
                                <td width=10%>$dt_passeio</td>
                                <td width=10%>$hora_inicio</td>
                                <td width=10%>$hora_fim</td>
                                <td width=10%>$nome_pet</td>
                                </tr>";
                        }
                    }else{
                        echo "<h4>Não existem passeios a serem realizados</h4>";
                    }
                ?>                 
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php }else{

        $sqlIndexAdm = "SELECT DISTINCT
        CONCAT(U.nome,' ',U.sobrenome) as passeador,
        CONCAT(U1.nome,' ',U1.sobrenome) as cliente,
        P.dt_passeio,
        P.hora_inicio,
        P.hora_fim,
        PE.nome as nome_pet,
        P.ativo as passeio_realizado,
        P.id as id_pacote
        FROM servico S
        INNER JOIN usuario U ON (S.id_passeador = U.id AND U.perfil = 'pas')
        INNER JOIN usuario U1 ON (S.id_cliente = U1.id AND U1.perfil = 'cli')
        INNER JOIN pacote P ON (P.id_usuario = U1.id)
        INNER JOIN pet PE ON (PE.id = S.id_pet)
        WHERE
        PE.ativo = 1
        AND P.ativo = 1";
    $resultadoSqlIndexAdm = mysqli_query($conn,$sqlIndexAdm);
    $contadorIndexAdm = mysqli_num_rows($resultadoSqlIndexAdm);
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Próximos Passeios</h2>
            </div>
            <div class="panel panel-default">
            
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Passeador</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nome Pet</th>
                        <th scope="col">Data Passeio</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Termino</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    if ($contadorIndexAdm > 0) {
                        while ($linhaIndexAdm = $resultadoSqlIndexAdm -> fetch_array(MYSQLI_ASSOC)) {
                            $passeador = $linhaIndexAdm['passeador'];
                            $cliente = $linhaIndexAdm['cliente'];
                            $nome_pet = $linhaIndexAdm['nome_pet'];
                            $dt_passeio = $linhaIndexAdm['dt_passeio'];
                            $hora_inicio = $linhaIndexAdm['hora_inicio'];
                            $hora_fim = $linhaIndexAdm['hora_fim'];
    
                            echo "<tr>
                                <td width=20%>$passeador</td>
                                <td width=20%>$cliente</td>
                                <td width=10%>$nome_pet</td>
                                <td width=10%>$dt_passeio</td>
                                <td width=10%>$hora_inicio</td>
                                <td width=10%>$hora_fim</td>
                                </tr>";
                        }
                    }else{
                        echo "<h4>Não existem passeios a serem realizados</h4>";
                    }
                ?>                 
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<?php
include "rodape.php";
?>