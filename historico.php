<?php
include "cabecalho.php";
$perfil = $_SESSION['perfil'];
$id = $_SESSION['id'];

if ($perfil == 'pas') {
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    
    $sqlIndexPasseadores = "SELECT DISTINCT
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
    AND P.ativo = 0";
    $resultadoSqlIndexPasseadores = mysqli_query($conn,$sqlIndexPasseadores);
    $contadorIndexPasseadores = mysqli_num_rows($resultadoSqlIndexPasseadores);

    $quantidade_pg = 10;
    $num_pagina = ceil($contadorIndexPasseadores/$quantidade_pg);
    $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

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
    AND P.ativo = 0
    LIMIT $incio, $quantidade_pg";
    $resultadoSqlIndexPasseador = mysqli_query($conn,$sqlIndexPasseador);
    $contadorIndexPasseador = mysqli_num_rows($resultadoSqlIndexPasseador);
?>
<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Passeios Já Finalizados</h2>
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
                    </tr>
                </thead>
                <tbody>
            <?php
                if ($contadorIndexPasseador > 0) {
                    while ($linhaIndexPasseador = mysqli_fetch_assoc($resultadoSqlIndexPasseador)) {
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
                            <td width=10%>$nome_pet</td>
                            </tr>";
                    }
                }else{
                    echo "<h4>Não existem passeios disponíveis</h4>";
                }
            ?>                 
            </tbody>
            </table>
        </div>
        <?php
            //Verificar a pagina anterior e posterior
            $pagina_anterior = $pagina - 1;
            $pagina_posterior = $pagina + 1;
        ?>
        <nav class="text-center">
            <ul class="pagination">
                <li>
                    <?php
                    if($pagina_anterior != 0){ ?>
                        <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    <?php }else{ ?>
                        <span aria-hidden="true">&laquo;</span>
                <?php }  ?>
                </li>
                <?php 
                //Apresentar a paginacao
                for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                    <li><a href="http://www.petline.com.br/historico.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li>
                    <?php
                    if($pagina_posterior <= $num_pagina){ ?>
                        <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    <?php }else{ ?>
                        <span aria-hidden="true">&raquo;</span>
                <?php }  ?>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php }else if ($perfil == 'cli'){
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    $sqlIndexClientes = "SELECT DISTINCT
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
    AND P.ativo = 0";
    $resultadoSqlIndexClientes = mysqli_query($conn,$sqlIndexClientes);
    $contadorIndexClientes = mysqli_num_rows($resultadoSqlIndexClientes);

    $quantidade_pg = 10;
    $num_pagina = ceil($contadorIndexClientes/$quantidade_pg);
    $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

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
    AND P.ativo = 0
    LIMIT $incio, $quantidade_pg";
    $resultadoSqlIndexCliente = mysqli_query($conn,$sqlIndexCliente);
    $contadorIndexCliente = mysqli_num_rows($resultadoSqlIndexCliente);
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Passeios Já Finalizados</h2>
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
                        while ($linhaIndexCliente = mysqli_fetch_assoc($resultadoSqlIndexCliente)) {
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
                        echo "<h4>Não existem passeios disponíveis</h4>";
                    }
                ?>                 
                </tbody>
                </table>
            </div>
        </div>
        <?php
            //Verificar a pagina anterior e posterior
            $pagina_anterior = $pagina - 1;
            $pagina_posterior = $pagina + 1;
        ?>
        <nav class="text-center">
            <ul class="pagination">
                <li>
                    <?php
                    if($pagina_anterior != 0){ ?>
                        <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    <?php }else{ ?>
                        <span aria-hidden="true">&laquo;</span>
                <?php }  ?>
                </li>
                <?php 
                //Apresentar a paginacao
                for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                    <li><a href="http://www.petline.com.br/historico.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li>
                    <?php
                    if($pagina_posterior <= $num_pagina){ ?>
                        <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    <?php }else{ ?>
                        <span aria-hidden="true">&raquo;</span>
                <?php }  ?>
                </li>
            </ul>
        </nav>
    </div>
<?php }else{
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    $sqlIndexAdms = "SELECT DISTINCT
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
    AND P.ativo = 0";
    $resultadoSqlIndexAdms = mysqli_query($conn,$sqlIndexAdms);
    $contadorIndexAdms = mysqli_num_rows($resultadoSqlIndexAdms);

    $quantidade_pg = 10;
    $num_pagina = ceil($contadorIndexAdms/$quantidade_pg);
    $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

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
    AND P.ativo = 0
    LIMIT $incio, $quantidade_pg";
    $resultadoSqlIndexAdm = mysqli_query($conn,$sqlIndexAdm);
    $contadorIndexAdm = mysqli_num_rows($resultadoSqlIndexAdm);
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Passeios Já Finalizados</h2>
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
                        while ($linhaIndexAdm = mysqli_fetch_assoc($resultadoSqlIndexAdm)) {
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
                        echo "<h4>Não existem passeios disponíveis</h4>";
                    }
                ?>                 
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        //Verificar a pagina anterior e posterior
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina + 1;
    ?>
    <nav class="text-center">
        <ul class="pagination">
            <li>
                <?php
                if($pagina_anterior != 0){ ?>
                    <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                <?php }else{ ?>
                    <span aria-hidden="true">&laquo;</span>
            <?php }  ?>
            </li>
            <?php 
            //Apresentar a paginacao
            for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                <li><a href="http://www.petline.com.br/historico.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li>
                <?php
                if($pagina_posterior <= $num_pagina){ ?>
                    <a href="http://www.petline.com.br/historico.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                <?php }else{ ?>
                    <span aria-hidden="true">&raquo;</span>
            <?php }  ?>
            </li>
        </ul>
    </nav>
<?php } ?>

<?php
include "rodape.php";
?>