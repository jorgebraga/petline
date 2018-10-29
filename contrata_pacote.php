<?php
include "cabecalho.php"
?>

<div class="container">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Contratação de Pacotes</h2>
        </div>
        <form action="contrata_dia.php" method="post" name="contrata_pacote" id="contrata_pacote">
            <div class="form-row">
                <div class="col-md-12 panel panel-default">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Pacote</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tr>
                            <td align="center" width="40px"><input type="radio" name="pacote_opcao" value="LINE_BASIC" checked></td>
                            <td width=20%>Line Basic</td>
                            <td width=60%>É o pacote mais básico! Contém 8 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td width=15%>R$ 339,72</td>
                        </tr>
                        <tr>
                            <td align="center" width="40px" ><input type="radio" name="pacote_opcao" value="RICH_DOG"></td>
                            <td width=20%>Rich Dog</td>
                            <td width=60%>É o pacote intermediário! Contém 12 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td width=15%>R$ 482,76</td>
                        </tr>
                        <tr>
                            <td align="center" width="40px" ><input type="radio" name="pacote_opcao" value="GOLDEN_DOG"></td>
                            <td width=20%>Golden Dog</td>
                            <td width=60%> É o pacote mais avançado! Contém 22 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td width=15%>R$ 835,89</td>
                        </tr>
                    </table>
                </div>

                <div class="form-row">
                    <div align="right">
                        <button type="submit" class="btn btn-primary" name="envia_pacote">Avançar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?php
include "rodape.php"
?>