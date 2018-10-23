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
                <div class="col-md-12">
                    <label for="#">Selecione um Pacote</label>
                    <table border="1px">
                        <tr>
                            <th width="40px"></th>
                            <th>Pacote</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                        </tr>
                        <tr>
                            <td align="center"><input type="radio" name="pacote_opcao" value="LINE_BASIC" checked></td>
                            <td>Line Basic</td>
                            <td>É o pacote mais básico! Contém 8 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td>R$ 339,72</td>
                        </tr>
                        <tr>
                            <td align="center"><input type="radio" name="pacote_opcao" value="RICH_DOG"></td>
                            <td>Rich Dog</td>
                            <td>É o pacote intermediário! Contém 12 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td>R$ 482,76</td>
                        </tr>
                        <tr>
                            <td align="center"><input type="radio" name="pacote_opcao" value="GOLDEN_DOG"></td>
                            <td>Golden Dog</td>
                            <td> É o pacote mais avançado! Contém 22 passeios que podem ser distribuídos durante o mês vigente.</td>
                            <td>R$ 835,89</td>
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